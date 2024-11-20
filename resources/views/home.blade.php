@extends('layouts.main')
@section('content')
<div class="container">
      <div class="banners">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselId" data-slide-to="1"></li>
                      <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                      <div class="carousel-item active">
                        <img
                          src="site/images/banner/banner-1.png"
                          class="img-fluid"
                          alt="First slide"
                        />
                      </div>
                      <div class="carousel-item">
                        <img
                          src="site/images/banner/banner-6.png"
                          class="img-fluid"
                          alt="Second slide"
                        />
                      </div>
                      <div class="carousel-item">
                        <img
                          src="site/images/banner/banner-2.png"
                          class="img-fluid"
                          alt="Third slide"
                        />
                      </div>
                    </div>
                    <a
                      class="carousel-control-prev"
                      href="#carouselId"
                      role="button"
                      data-slide="prev"
                    >
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a
                      class="carousel-control-next"
                      href="#carouselId"
                      role="button"
                      data-slide="next"
                    >
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
        </div>
      </div>
      <div class="section-wrap">
        <div class="header-wrap py-4 mt-3 text-center">
          <div class="title" style="color: rgb(80, 181, 50); font-size: 20px;">BỘ SƯU TẬP</div>
        </div>

        <div class="content-section">
          <div class="row">
            <div class="col-md-4">
              <a class="item" style="order: 3" href="">
                <img
                  src="site/images/banner/banner-3.png"
                  width="100%"
                  height="179"
                  alt="icon flash"
                />
              </a>
            </div>
            <div class="col-md-4">
              <a class="item" style="order: 1" href="">
                <img
                  src="site/images/banner/banner-4.png"
                  width="100%"
                  height="179"
                  alt="icon flash"
                />
              </a>
            </div>
            <div class="col-md-4">
              <a class="item" style="order: 2" href="">
                <img
                  src="site/images/banner/banner-5.png"
                  width="100%"
                  height="179"
                  alt="icon flash"
                />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product-body" id="product-box">
      <div class="container">
        <div class="header-wrap py-4 mt-3 text-center">
          <div class="title" style="color: rgb(80, 181, 50); font-size: 20px;">Sản Phẩm Nổi Bật</div>
        </div>
        <section class="slider">
          <ul id="autoWidth" class="cs-hidden">
            @foreach($product as $pr)
          <li class="item-a">
          <div class="box">
          <div class="slide-img">
          <img alt="1" src="uploads/{{ $pr->image }}" class="img-fluid">
          <div class="overlay d-flex flex-column">
          <a href="{{ route('cart.add', $pr->id) }}" class="buy-btn ">Mua Ngay</a>
          <a href="{{ route('order', $pr->id) }}" class="buy-btn mt-1">Chi tiết</a>
          </div>
          </div>
          <div class="detail-box">
          <div class="type">
          <a href="{{ route('order', $pr->id) }}">{{ $pr->name }}</a>
          <span>{{ $pr->status == 0 ? 'Còn Hàng' : "Hết Hàng" }}</span>
          </div>
          <a href="{{ route('order', $pr->id) }}" class="price">{{ number_format($pr->sale_price ? $pr->sale_price : $pr->price) }}đ</a>
            
          </div>
          
          </div>		
        </li>
        @endforeach          
        </ul>
          </section>
      </div>  
    </div>
    <div class="product-body">
      <div class="container">
        <div class="header-wrap py-4 mt-3 text-center">
          <div class="title" style="color: rgb(80, 181, 50); font-size: 20px;">Quần Áo Nữ</div>
        </div>
        <div class="products">
          <div class="tab-content mt-md-1" style="background-color: #2ecc71;">
            <div class="tab-pane container active" id="home">
              <div id="top-products" class="owl-carousel owl-theme py-4">
                 @foreach($product as $pr)
                @if ($pr->gender === 'female')
               <div class="item p-2">
                  <div class="card">
                      <img class="card-img-top img-fluid" src="uploads/{{ $pr->image }}" alt="Card image">
                      <div class="card-body text-center">
                          <h6 class="card-title" style="font-size: 11px;">{{ $pr->name }}</h6>
                          <p class="card-text" style="font-size: 11px">{{ number_format($pr->sale_price ? $pr->sale_price : $pr->price) }}đ</p>
                          <a href="{{ route('order', $pr->id) }}" class="btn btn-primary" style="text-decoration: none;">Chi tiết</a>
                          <a href="{{ route('cart.add', $pr->id) }}" class="buy-btn1">Mua Ngay</a>
                      </div>
                  </div>
              </div>
                @endif
                @endforeach                             
                </div>
              </div>
            </div>             
          </div>
          </div>

        </div>  
    </div>
    <div class="product-body mb-2">
      <div class="container">
        <div class="header-wrap py-4 mt-3 text-center">
          <div class="title" style="color: rgb(80, 181, 50); font-size: 20px;">Quần Áo Nam</div>
        </div>
        <div class="products">
          <div class="tab-content mt-md-1" style="background-color: #2ecc71;">
            <div class="tab-pane container active" id="home">
              <div id="blog-news" class="owl-carousel owl-theme py-4">
                @foreach($product as $pr)
                @if ($pr->gender === 'male')
                <div class="item p-2">
                  <div class="card">
                     <img  class="card-img-top img-fluid" src="uploads/{{ $pr->image }}" alt="Card image">
                     <div class="card-body text-center">
                          <h6 class="card-title" style="font-size: 11px;">{{ $pr->name }}</h6>
                          <p class="card-text" style="font-size: 11px">{{ number_format($pr->sale_price ? $pr->sale_price : $pr->price) }}đ</p>
                          <a href="{{ route('order', $pr->id) }}" class="btn btn-primary" style="text-decoration: none;">Chi tiết</a>
                          <a href="{{ route('cart.add', $pr->id) }}" class="buy-btn1">Mua Ngay</a>
                      </div>
                  </div>
                </div>
                @endif
                @endforeach                                                                                           
                </div>
                </div>
              </div>             
          </div>
          </div>

        </div>  
    </div>
@stop()

