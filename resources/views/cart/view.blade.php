@extends('layouts.main')
@section('content')
<div class="body-cart mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 my-1">
                        <div class="container">
                            <h5 class="inline mt-3">Giỏ hàng ({{ $cart->totalQuantity }})</h5>

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
                                        <th><span class="float-left">Sản Phẩm</span></th>
                                        <th></th>
                                        <th>Đơn Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng Tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart->items as $item)
                                    <tr>
                                        <td>
                                            <img src="uploads/{{ $item->image }}" alt="" class="img-fluid float-left" width="100px">
                                        </td>
                                        <td class="text-truncate" style="max-width: 200px;" >{{ $item->name }}</td>
                                        <td>{{ number_format($item->price) }}đ</td>
                                        <td>
                                            <form action="{{ route('cart.update', $item->id) }}" method="get">
                                                <div class = "">
                                                    <input type = "number" class="form-control" name="quantity" min = "1" value = "{{ $item->quantity }}">
                                                    <button type = "submit" class = "btn btn-primary">
                                                    update <i class = "fas fa-shopping-cart"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td>{{ number_format($item->quantity * $item->price) }}đ</td>
                                        <td>
                                            <a href="{{route('cart.remove', $item->id) }}" class="text-dark"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <div class="text-center">
                                <a href="{{ route('home') }}#product-box" class="btn btn-primary">Tiếp Tục Mua Hàng</a>
                                <a href="{{ route('cart.clear') }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa không ?')">Xóa Giỏ Hàng</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="total">
                            <div class="vocher p-1">Dùng mã giảm giá của YODY trong bước tiếp theo</div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="total-order">
                                            <div>Tổng Đơn:</div>
                                            <div class="ml-md-1">{{ number_format($cart->totalPrice) }}đ</div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 pay">
                                        <a href="{{ route('orders.checkout') }}" class="btn btn-success">Thanh toán</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop()

@section('script')
<script>
        let countingElement = document.getElementById("counting");

if (countingElement !== null) {
    let data = 0;

    // Khởi tạo giá trị trong thẻ h2
    countingElement.innerText = data;

    // Tạo hàm tăng giảm
    function increment() {
        data = data + 1;
        countingElement.innerText = data;
    }

    function decrement() {
        if (data > 0) {
            data = data - 1;
            countingElement.innerText = data;
        }
    }
} else {
    console.error("Không tìm thấy phần tử với id 'counting'");
}
@stop()