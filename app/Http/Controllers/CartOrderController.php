<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Common\CartHelp;
use App\Mail\OrderEmail;
use Mail;

class CartOrderController extends Controller
{
    public function checkout(){
        $auth = auth('acc')->user();
        return view('cart.checkout',compact('auth'));
    }
    public function post_checkout(Request $req, CartHelp $cart){
        $auth = auth('acc')->user();
        $OrderSave = true;
        $form_data = $req->only('name','email','address','phone','note');
        $form_data['account_id'] = auth('acc')->id();
        $form_data['token'] = \Str::random(40);

        if($order = Order::create($form_data)){
            foreach($cart->items as $item){
                $detail = [
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                ];
                if(!OrderDetail::create($detail)){
                    $OrderSave = false;
                    break;
                }
            }
            if($OrderSave){
                $emailTo= 'mrtdt2105@gmail.com';
                Mail::to($emailTo)->send(new OrderEmail($order, $auth));
                $cart->clear();
                return redirect()->route('orders.checkout')->with('ok', 'Đặt hàng thành công!');
            }else{
                OrderDetail::where('order_id',$order->id)->delete();
                $order->delete();
                return redirect()->back()->with('no', 'Đặt hàng không thành công!');
            }
        }
        return view('cart.checkout',compact('auth'));
    }
    public function detail(Order $order){
        return view('cart.detail',compact('cart'));
    }
    public function orderList(){
        return view('cart.orderList');
    }

    public function verify($token){
        $order = Order::where('token', $token)->firstOrFail();
        $order->update(['status' => 1, 'token' => null]);
        return redirect()->route('orders.checkout')->with('ok', 'Xác Nhận đặt hàng thành công!');
    }
}
