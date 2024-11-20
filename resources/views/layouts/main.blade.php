<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shop quần áo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <base href="/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta 
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="site/css/style.css" />
    <link rel="stylesheet" href="site/css/lightslider.css">
    
    <link rel="stylesheet" href="site/plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="site/plugins/owl-carousel/assets/owl.theme.default.min.css">
    @yield('css')
    <link rel="shortcut icon" href="site/images/logo.png" type="image/x-icon" />
  </head>
  <body>
    <header class="header">
    <div class="container-navbar">
      <div class="container">
        <div class="header py-md-3">
          <div class="nav-wrap">
            <div class="nav-header">
              <div class="topbar-top">
                <div class="row">
                  <div class="col-md-4 d-flex">
                    <div class="logo mr-md-2">
                      <a href="">
                        <img src="site/images/logo.png" width="100px" alt="" />
                      </a>
                    </div>

                    <form
                    action=""
                    method="POST"
                    role="form">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search">
                      <div class="input-group-append">
                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>
                  <div class="col-md-8">
                    <div class="top-bar_right float-right py-md-2">
                      <div class="list-contact">
                        <a href="#" class="map"
                          ><i class="fa-solid fa-location-dot"></i> Tìm
                          <span class="number">250</span> cửa hàng</a
                        >
                        <a href="tel:18002086" class="phone ml-md-2"
                          ><i class="fa-solid fa-phone"></i> <b>1800 2086</b>
                        </a>
                        <span class="text-free">FREE</span>
                        <span style="margin: 0 8px">-</span>
                        <span
                          style="
                            margin: 0 8px;
                            font-weight: 600;
                            font-size: 16px;
                          "
                          >Đặt hàng gọi</span
                        >
                        <a href="tel:02499986999" class="phone"
                          ><i class="fa-solid fa-phone"></i> 02499986999
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="top-bar_bottom mt-md-2">
                <div class="row">
                  <div class="col-md-7">
                    <div class="topbar-bottom__left">
                      <div class="header-nav">
                        <ul class="nav">
                          <li class="nav-item">
                            <a class="nav-link active" href="{{route('home')}}">Trang Chủ</a>
                          </li>
                          <li class="nav-item dropdown">
                            <a
                              class="nav-link dropdown-toggle"
                              href=""
                              id="dropdownId"
                              data-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                              >SẢN PHẨM</a
                            >
                            <div
                              class="dropdown-menu orange-bg"
                              aria-labelledby="dropdownId"
                            >
                              <a class="dropdown-item" href="{{ route('shop') }}">TẤT CẢ</a>
                              <a class="dropdown-item" href="#">Áo Nam</a>
                              <a class="dropdown-item" href="#">Áo Nữ</a>
                              <a class="dropdown-item" href="#">Đồng Phục</a>
                              <a class="dropdown-item" href="#">Quần Nam</a>
                              <a class="dropdown-item" href="#">Quần Nữ</a>
                            </div>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">Giới Thiệu</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Liên Hệ</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Tin Tức</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="topbar-bottom__right">
                      <div class="cart">
                        <ul class="nav float-right bottom-nav">
                         
                          @if (Auth::guard('acc')->check())
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}"
                              ><i class="fa-solid fa-user"></i> {{ Auth::guard('acc')->user()->name }}</a
                            >
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                              ><i class="fa-solid fa-user"></i>Đăng Xuất</a
                            >
                          </li>
                          @else
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"
                              ><i class="fa-solid fa-user"></i> Đăng Nhập</a
                            >
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"
                              ><i class="fa-solid fa-user-plus"></i> Đăng Ký</a
                            >
                          </li>
                          @endif
                          <li class="nav-item">
                            <a class="nav-link mr-md-3" href="{{ route('cart.view') }}"
                              ><i class="fa-solid fa-cart-shopping"></i>
                              <span class="count">{{ $cart->totalQuantity }}</span>Giỏ Hàng</a
                            >
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="main">
    @yield('content')
    
    
  </div>
    <footer class="footer">
      <div class="container pt-4">
          <div class="row">
              <div class="col-md-3">
                  <p>“Đặt sự hài lòng của khách hàng là ưu tiên số 1 trong mọi suy nghĩ hành động của mình” là sứ mệnh, là
                      triết lý, chiến
                      lược.. luôn cùng YOY tiến bước</p>
  
                  <form action="" method="POST" role="form">
  
                      <h5 >ĐĂNG KÝ NHẬN THÔNG TIN</h5>
                      <div class="form-row">
                          <div class="col-md-9">
                              <input type="text" class="form-control" id="" placeholder="Nhập email đăng ký của bạn">
                          </div>
                          <div class="col-md-3">
                              <button type="submit" style="font-size: 10px;" class="btn btn-success btn-block">Đăng ký</button>
                          </div>
  
                      </div>
  
                  </form>
                  <div>
                      <a href="https://www.facebook.com/C.THAID" target="_blank">
                          <i class="fa-brands fa-facebook"></i>
                      </a>
                      <a href="" target="_blank">
                          <i class="fa-brands fa-youtube"></i>
                      </a>
                      <a href="https://chat.zalo.me/" target="_blank">
                          <i class="fa-brands fa-instagram"></i>
                      </a>
                      <a href="https://chat.zalo.me/" target="_blank">
                        <i class="fa-brands fa-tiktok"></i>
                      </a>
                      <a href="https://chat.zalo.me/" target="_blank">
                          <i class="fa-brands fa-shopify"></i>
                      </a>
                  </div>
              </div>
          <div class="col-md-2 custom-links">
              <h5>VỀ YOY</h5>
              <a href="{{ route('about') }}">Giới thiệu</a>
              <a href="{{ route('contact') }}">Liên hệ</a>
              <a href="">Tuyển dụng</a>
              <a href="">Tin tức</a>
              <a href="">Hệ thống cửa hàng</a>
              <a href="">Hàng mới về</a>
          </div>
          <div class="col-md-3 custom-links">
              <h5>HỖ TRỢ KHÁCH HÀNG</h5>
              <a href="">Hướng dẫn chọn size</a>
              <a href="">Chính sách Khách hàng thân thiết</a>
              <a href="">Chính sách Bảo hành, đổi/trả</a>
              <a href="">Chính sách Thanh toán, giao nhận</a>
              <a href="">Chính sách Đồng phục</a>
              <a href="">Chính sách Bảo mật thông tin khách hàng</a>
              <a href="">Chính sách Sử dụng Cookies</a>
          </div>
              <div class="col-md-4">
                  <h5>CÔNG TY CP THỜI TRANG YOY</h5>
                      <div class="row">
                          <div class="col-md-1">
                              <i class="fa-solid fa-location-dot"></i>
                          </div>
                          <div class="col-md-9">
                              <p>Công ty cổ phần Thời trang YOY</p>
                      </div>
                  </div>
                  <p>Mã số thuế: 0801206940</p>
                  <span>Địa chỉ: Đường An Định - Phường Việt Hòa - Thành phố Hải Dương - Hải Dương</span>
                  <div class="row">
                      <div class="col-md-1">
                          <i class="fa-solid fa-shop"></i>
                      </div>
                      <div class="col-md-9">
                          <p>Tìm cửa hàng gần bạn nhất</p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-1">
                      <i class="fa-solid fa-phone"></i>
                      </div>
                      <div class="col-md-9">
                          <p>Liên hệ đặt hàng: 024 999 86 999.</p>
                      </div>
                  </div>
                  <span>Thắc mắc đơn hàng: 024 999 86 999.</span>
                  <span>Góp ý khiếu nại: 1800 2086.</span>
                  <div class="row">
                      <div class="col-md-1">
                          <i class="fa-solid fa-envelope"></i>
                      </div>
                      <div class="col-md-9">
                          <p style="font-size: 15px;">Email: chamsockhachhang@yoy.vn</p>
                      </div>
                  </div>
          </div>
      </div>
      </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript" src="site/js/Jquery.js"></script>
    <script type="text/javascript" src="site/js/lightslider.js"></script>
    <script type="text/javascript" src="site/js/script.js"></script>
    <script src="site/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="site/js/owl-carousel.js"></script>
    <script src="site/js/order.js"></script>
    
  @yield('script')
  </body>
</html>
