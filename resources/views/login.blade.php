@extends('layouts.main')
@section('content')
<div class="section-login">
      <div class="container">
        <div class="login-bg">
          <div class="left-col">
            <div class="login">
              <h1 style="font-size: 26px;">ĐĂNG <span style="font-size: 26px;">NHẬP</span></h1>
              
            </div>
            <form action="" class="needs-validation" method="POST" novalidate>
              @csrf
              <div class="form-group">
                
                <input type="text" class="form-control" id="email" placeholder="Nhập tên đăng nhập..." name="email" required>
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
              </div>
              <div class="form-group">
                
                <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu..." name="password" required>
                @error('password')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
              </div>
              <button type="submit" class="btn btn-success">Đăng Nhập</button>
            </form>
            <div class="register text-center mt-5" style="font-size: 15px;">
                Bạn chưa có tài khoản? 
                <a class="hover-register" style="text-decoration: none;" href="{{ route('register') }}">Đăng ký ngay!</a>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop()
