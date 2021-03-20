@extends('client.template.master')
@section('content')
    {{-- <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner">
                            <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="{{route('trang-chu')}}">Trang Chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Liên hệ</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <section class="htc__contact__area ptb--100 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                    <div class="map-contacts--2">
                        <div id="googleMap"></div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <h2 class="title__line--6">Liên hệ</h2>
                    <div class="address">
                        <div class="address__icon">
                            <i class="icon-location-pin icons"></i>
                        </div>
                        <div class="address__details">
                            <h2 class="ct__title">ĐỊA CHỈ</h2>
                            <p>Nguyễn Văn Cừ, An Khánh, Ninh Kiều, Cần Thơ</p>
                        </div>
                    </div>
                    <div class="address">
                        <div class="address__icon">
                            <i class="icon-envelope icons"></i>
                        </div>
                        <div class="address__details">
                            <h2 class="ct__title">EMAIL</h2>
                            <p>hanhanlipstick@gmail.com</p>
                        </div>
                    </div>

                    <div class="address">
                        <div class="address__icon">
                            <i class="icon-phone icons"></i>
                        </div>
                        <div class="address__details">
                            <h2 class="ct__title">SỐ ĐIỆN THOẠI</h2>
                            <p>0355632817</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
