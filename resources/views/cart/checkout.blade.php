@extends('layouts.main')
@section('content')



<div class="mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        {{-- if(auth('cus')->check()) --}}
                        {{-- check là người dùng đã đăng nhập hay chưa --}}
                    
          @if($auth && $auth->name)
          <h4>Form Checkout</h4>
    <form action="{{ route('orders.checkout') }}" class="needs-validation" method="POST" novalidate>
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" id="name" value="{{ $auth->name }}" placeholder="Họ và tên" name="name" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="phone" value="{{ $auth->phone }}" placeholder="Số điện thoại" name="phone" required>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="address" value="{{ $auth->address }}" placeholder="Địa Chỉ" name="address" required>
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="email" value="{{ $auth->email }}" placeholder="Địa chỉ email" name="email" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="note">Ghi chú đơn hàng</label>
                <textarea class="form-control" name="note" id="note" rows="3"></textarea>
            </div>
        </div>
        @if($auth)
    <form action="{{ route('orders.checkout') }}" method="get">
        <!-- Các trường dữ liệu khác nếu cần -->
        <button type="submit" class="btn btn-success">Thanh toán</button>
    </form>
@endif
    </form>
@else
        <div>Bạn có thể đăng nhập <a href="{{route('login')}}">tại đây</a></div>
        <h4>Form Checkout</h4>
    <form action="{{ route('orders.checkout') }}" class="needs-validation" method="POST" novalidate>
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" id="name" placeholder="Họ và tên" name="name" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="phone" placeholder="Số điện thoại" name="phone" required>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="address" placeholder="Địa Chỉ" name="address" required>
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="Địa chỉ email" name="email" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="note">Ghi chú đơn hàng</label>
                <textarea class="form-control" name="note" id="note" rows="3"></textarea>
            </div>
        </div>

        <a href="{{ route('login') }}" type="submit" class="btn btn-success" onclick="return confirm('Bạn có muốn đăng nhập không')">Thanh toán</a>
    </form>
@endif

            </div>
                    <div class="col-md-8">
                         <div class="container"></div>
                            @if(Session::has('ok'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{Session::get('ok')}}
                            </div>
                            @endif
                            @if(Session::has('no'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{Session::get('no')}}
                            </div>
                            @endif
                            
                            
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr class="algin-center">
                                        <th>STT</th>
                                        <th><span class="float-left">Sản Phẩm</span></th>
                                        <th>Ảnh</th>
                                        <th>Đơn Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart->items as $item)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td class="text-truncate">{{ $item->name }}</td>
                                        <td>
                                            <img src="uploads/{{ $item->image }}" alt="" class="img-fluid " width="35px">
                                        </td>
                                        <td>{{ number_format($item->price) }}đ</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->quantity * $item->price) }}đ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
@stop()
                
                       