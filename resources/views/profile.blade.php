@extends('layouts.main')
@section('content')
<div class="section-login">
      <div class="container">
        <div class="login-bg">
          <div class="left-col">
            <div class="login">
              <h1 style="font-size: 26px;">Thông Tin <span style="font-size: 26px;">Người Dùng</span></h1>
              
            </div>
            <form action="" class="needs-validation" method="POST" novalidate>
              @csrf
              <div class="form-group">
                
                <input type="text" class="form-control" value="{{ $auth->name }}" id="uname" name="name" required>
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
              </div>
              <div class="form-group">
                
                <input type="text" class="form-control" id="uname" value="{{ $auth->phone }}" name="phone" required>
                @error('phone')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
              </div>
              <div class="form-group">
                
                <input type="text" class="form-control" id="uname" value="{{ $auth->address }}" name="address" required>
                @error('address')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
              </div>
              <div class="form-group">
                
                <input type="email" class="form-control" id="uname" value="{{ $auth->email }}" name="email" required>
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
              </div>
              <button type="submit" class="btn btn-success">Lưu Lại</button>
            </form>
          </div>
        </div>
      </div>
    </div>

@stop()

