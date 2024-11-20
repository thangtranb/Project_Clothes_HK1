<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.Dashboard');
    }
    public function login() {
        // User::create([
        //     'name' => 'Trần Đức Thắng',
        //     'email' => 'thang@gmail.com',
        //     'password' => bcrypt(123456),
        // ]);
        return view('admin.login');
    }
    public function check_login(Request $request) {
        $form_data = $request->only('email', 'password');
        $check_login = Auth::attempt($form_data);

        if($check_login) {
            return redirect()->route('admin');
        } else {
            return redirect()->back(); 
        }
    }

    public function register() {
        return view('admin.register');
    }

    public function check_register (Request $req) {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
       $form_data = $req->only('name','email', 'password');
       $form_data['password'] = bcrypt($req->password);
       if (User::create($form_data)) {
        return redirect()->route('admin.login');
       } 
        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
