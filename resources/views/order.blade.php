@extends('layouts.main')
@section('content')
<div class = "card-wrapper">
      <div class = "card">
        <!-- card trái -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "uploads/{{ $product->image }}" alt = "image">
              @if ($product->images)
              @foreach ($product->images as $img)
              <img src = "uploads/{{ $img->name }}" alt = "{{ $img->name }}">
              @endforeach
              @endif
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "uploads/{{ $product->image }}" alt = "{{ $product->name }}">
              </a>
            </div>
            @if ($product->images)
            @foreach ($product->images as $img)
            <div class = "img-item">
              <a href = "#" data-id = "{{ $loop->index + 2 }}">
                <img src = "uploads/{{ $img->name }}" alt = "{{ $img->name }}">
              </a>
            </div>
            @endforeach
            @endif
          </div>
        </div>
        <!-- card phải -->
        <div class = "product-content">
          <h2 class = "product-title">{{ $product->name }}</h2>
          <a href = "#" class = "product-link">Hãy Đến YOY</a>
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div>

          <div class = "product-price">
            <p class = "last-price">Giá cũ: <span>{{ $product->price }}</span></p>
            <p class = "new-price">Giá mới: <span>{{ $product->sale_price }} (5%)</span></p>
          </div>

          <div class = "product-detail">
            <h2>chi tiết sản phẩm: </h2>
            <p>Thành phần :88% Polyester, 11% Viscose,1% Metalised Fiber

              Chất liệu được ưa chuộng trong mùa đông vừa giữ ấm cho cơ thể, thời trang
              
              Với đặc trưng vải dạ dày dặn, không bai dão, khách hàng có thể giặt máy 
              
              Chân váy dạ giúp người mặc giữ ấm mà vẫn lên đồ thật sành điệu
              
              Sản xuất tại Việt Nam</p>
            <p>Đợi gì nữa mà không mua.</p>
            <ul>
              <li>Màu: <span>Đen</span></li>
              <li>Trạng thái: <span>{{ $product->status == 0 ? 'Còn Hàng' : 'Hết Hàng' }}</span></li>
              <li>Sản phẩm: <span>Áo</span></li>
              <li>Ship đến: <span>Cả thế giới</span></li>
              <li>Shipping Fee: <span>Free</span></li>
            </ul>
          </div>
          <form action="{{ route('cart.add', $product->id) }}" method="get">
          <div class = "purchase-info">
            <input type = "number" name="quantity" min = "1" value = "1">
            <button type = "submit" class = "btn">
              Giỏ Hàng <i class = "fas fa-shopping-cart"></i>
            </button>
            <button type = "button" class = "btn">So Sánh</button>
          </div>
          </form>
          <div class = "social-links">
            <p>Share At: </p>
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-whatsapp"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-pinterest"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
@stop()

