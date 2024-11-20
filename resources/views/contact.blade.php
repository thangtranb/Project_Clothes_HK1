@extends('layouts.main')
@section('content')
<div class="contact-container">
    <div class="contact">
        <img class="contact-anh card-img" src="site/images/bg-01.jpg" alt="">
        <h4>Liên Hệ</h4>
    </div>
</div>
<div class="container border mb-5">
    <div class="row">
        <div class="col-md-6 pt-3 pb-5">
            <h3>Liên Hệ Cho Chúng Tôi Qua</h3>
            <form action="" method="POST">
                @csrf
                <div class="  from-group mb-4">
                    <i class="fa-solid fa-envelope ml-5 mt-2"></i>
                    <input class="form-email " type="email" name="email" placeholder="Địa Chỉ Email Của Bạn">
                </div>

                <textarea name="body" class="form-control text-are" placeholder="Nội Dung Liên Hệ"></textarea>

                <div class="btn-login">
                    <button type="submit" class="w-100 text-white "> Gửi</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 pt-5 border">
            <div class="address ml-5">
                <div class="address1 d-flex">
                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                    <h5>Địa chỉ</h5>

                </div>
                <div class="address2">
                    <p>260 Hoàng Quốc Việt, Cầu Giấy</p>
                </div>
                <div class="address1 d-flex">
                    <i class="fa-solid fa-phone"></i>
                    <h5>Liên hệ</h5>

                </div>
                <div class="address2 text-primary">
                    <p>024 999 86 999</p>
                </div>
                <div class="address1 d-flex">
                    <i class="fa-regular fa-envelope"></i>
                    <h5>Hỗ trợ</h5>

                </div>
                <div class="address2 text-primary">
                    <p>yoy@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

</div>
<iframe
    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d473.52285492022514!2d105.78370646597928!3d21.04653826077724!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b4220c2bd%3A0x1c9e359e2a4f618c!2sPolytechnic%20Aptech!5e1!3m2!1sen!2s!4v1677138971029!5m2!1sen!2s"
    width="800" height="640" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade" class="w-100"></iframe>
@stop()

