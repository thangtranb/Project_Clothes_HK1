@extends('layouts.main')
@section('content')
<div class="container">
    <section class="bread-crumb p-2">
      <Span>Sắp Xếp theo:</Span>
      <select name="" id="" class="float-right">
        <option value="">Mặc Định</option>
        <option value="">Từ A-Z</option>
        <option value="">Từ Z-A</option>
      </select>
    </section>
      </div>
  <div class="body-product mt-3">
      <div class="container">
          <div class="row">
              <div class="col-md-3">
                <div class="article-left">
                  <div class="content-top">
                      <h6>DANH MỤC TIN TỨC</h6>
                      <div class="nav-category">
                          <ul>
                              <li><a href="">Thông Tin Tổng Hợp quần áo</a></li>
                              <li><a href="">Những Mẫu Quần Áo Mùa Thu</a></li>
                              <li><a href="">Mẫu Đồng Phục Gia Đình</a></li>
                              <li><a href="">Tin Tức Sale 10.10</a></li>
                              <li><a href="">Chính Sách</a></li>
                              <li><a href="">Hướng Dẫn</a></li>
                          </ul>
                      </div>
                  </div>                
                  <div class="content-top">
                      <h6>DANH MỤC SẢN PHẨM</h6>
                      <div class="nav-category">
                          <ul>
                              <li><a href="">Áo Nam</a></li>
                              <li><a href="">Áo Nữ</a></li>
                              <li><a href="">Quần Nam</a></li>
                              <li><a href="">Quần Nữ</a></li>
                              <li><a href="">Đồng Phục</a></li>
                              <li><a href="">Set Thu Đông</a></li>
                              <li><a href="">Set Gia Đình</a></li>
                              <!-- <li><a href="">Phụ Kiện Cầu Lông</a></li> -->
                          </ul>
                      </div>
                  </div>                
              </div>
              </div>
              <div class="col-md-9">
                  <div class="row">
                  @foreach($product as $pr)
                      <div class="col-md-3 mb-3">
                          <div class="card">
                            <div class="parent">
                              <img class="card-img-top img-fluid" src="uploads/{{ $pr->image }}" alt="Card image">
                            </div>
                              
                              <div class="card-body text-center">
                                <h6 class="card-title" style="font-size: 11px;">{{ $pr->name }}</h6>
                                <p class="card-text" style="font-size: 11px">{{ number_format($pr->sale_price ? $pr->sale_price : $pr->price) }}đ</p>
                                <a href="{{ route('order', $pr->id) }}" class="btn btn-success">Chi Tiết</a>
                              </div>
                            </div>
                      </div>
                      @endforeach
                  </div>
                  {{$product->links()}}
              </div>
          
          </div>
      </div>
  </div>
@stop()

