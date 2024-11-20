<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home() {
        $category = Category::all();
        $product = Product::all();
        return view('home', compact('category', 'product'));
    }
    public function shop() {
        $category = Category::all();
        $product = Product::paginate(8);
        return view('shop', compact('category', 'product'));
    }
    public function order($id) {
        $product = Product::find($id);
        return view('order', compact('product'));
    }
    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }

    public function post_contact(Request $req) {
        $email = $req->email;
        $data = $req->only('email', 'body');
        Mail::to($email)
        ->send(new ContactMail($data));

    }

    
    public function login() {
        return view('login');
    }
    public function check_login(Request $req) {
        $req->validate([
            'email' => 'required|email|exists:account',
            'password' => 'required'
        ]);
       $form_data = $req->only('email', 'password');
       if(auth('acc')->attempt($form_data)) {
        return redirect()->route('home');
       }
       return redirect()->back();
    }
    public function register() {
        return view('register');
    }

    public function post_register(Request $req) {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:account',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'phone' => 'required|unique:account',
            'address' => 'required'
        ]);
       $form_data = $req->only('name','email', 'password', 'confirm_password', 'phone', 'address');
       $form_data['password'] = bcrypt($req->password);
       if (Account::create($form_data)) {
        return redirect()->route('login');
       } 
        return redirect()->back();
       
    }

    public function logout() {
        auth('acc')->logout();
        return redirect()->route('login');
    }

    public function profile() {
        $auth = auth('acc')->user();
        return view('profile', compact('auth'));
    }
    public function checkout(){
       $auth = auth('acc')->user();
        if ($auth) {
        // Thực hiện các bước thanh toán hoặc chuyển hướng đến trang thanh toán
        // ...
        return view('orders.checkout'); // Ví dụ: Trang thanh toán thành công
    } else {
        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thanh toán.');
    }
    }
}
