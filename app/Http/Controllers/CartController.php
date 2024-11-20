<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Common\CartHelp;
use App\Models\Account;

class CartController extends Controller
{
    function view() {
        $account = Account::all();
        // $cart = new CartHelp();
        return view('cart.view', compact('account'));
        // dd($cart);
    }

    function add(CartHelp $cart, Product $product) {
        $quantity = request('quantity', 1);
        $cart->add($product, $quantity);
        return redirect()->route('cart.view')->with('ok', 'Thêm giỏ hàng thành công!');
      
    }

    function remove(CartHelp $cart, Product $product) {
        $cart->remove($product);
        return redirect()->route('cart.view')->with('ok', 'Xóa sản phẩm thành công!');
    }

    function update(CartHelp $cart, Product $product) {
        $quantity = request('quantity', 1);
        $cart->update($product, $quantity);
        return redirect()->route('cart.view')->with('ok', 'Cập nhật giỏ hàng thành công!');
    }

    function clear(CartHelp $cart) {
        $cart->clear();
        return redirect()->route('cart.view')->with('ok', 'Xóa giỏ hàng thành công!');
    }

}
