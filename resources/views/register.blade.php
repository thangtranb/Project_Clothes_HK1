@extends('layouts.main')
@section('content')
<div class="section-login">
      <div class="container">
        <div class="login-bg">
          <div class="left-col">
            <div class="login">
              <h1 style="font-size: 26px;">ĐĂNG <span style="font-size: 26px;">Ký</span></h1>
              
            </div>
            <form action="" class="needs-validation" method="POST" novalidate>
              @csrf
              <div class="form-group">
                
                <input type="text" class="form-control" id="uname" placeholder="Họ và tên" name="name" required>
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
              </div>
              <div class="form-group">
                
                <input type="text" class="form-control" id="uname" placeholder="Số điện thoại" name="phone" required>
                @error('phone')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
              </div>
              <div class="form-group">
                
                <input type="text" class="form-control" id="uname" placeholder="Địa Chỉ" name="address" required>
                @error('address')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
              </div>
              <div class="form-group">
                
                <input type="email" class="form-control" id="uname" placeholder="Địa chỉ email" name="email" required>
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
              </div>
              <div class="form-group">
                
                <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu" name="password" required>
                @error('password')
                <div class="text-danger">{{$message}}</div>
                @enderror
  
              </div>
              <div class="form-group">
                
                <input type="password" class="form-control" id="pwd" placeholder="Nhập Lại Mật khẩu" name="confirm_password" required>
                @error('confirm_password')
                <div class="text-danger">{{$message}}</div>
                @enderror
  
              </div>
              <button type="submit" class="btn btn-success">Đăng Ký</button>
            </form>
            <div class="register text-center mt-5" style="font-size: 15px;">
                Bạn đã có tài khoản? 
                <a class="hover-register" style="text-decoration: none;" href="{{ route('login') }}">Đăng nhập ngay!</a>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop()

