@extends('client.template.master')

@section('content')
        <div class="container">
            <div class="row">
                <h1 class="text-center" style="margin-top: 60px" >CHI TIẾT SẢN PHẨM</h1>
                <div class="col-md-6 order-1" style="margin-top: 40px" >
                    <div class="image_selected">
                        <img src="{{ asset('hinhanhsanpham') }}/{{ $sanPham->sp_hinhanh }}" style="width:350px;height:350px">
                    </div>
                </div>
                <!-- Description -->
                <div class="col-md-6 order-2" style="margin-top: 40px">
                    <form action="{{ route('them-sp-vao-cart', ['idProduct'=>$sanPham->sp_id]) }}" method="GET">
                        <ul class="list-group mt-5">
                            <li class="list-group-item border-none"><b>Thông tin sản phẩm</b></li>
                            <li class="list-group-item border-none">Giá: {{ number_format($sanPham->sp_gia) }}</li>
                            <li class="list-group-item border-none">
                            Số lượng: <input type="number" name="soLuong" value="1" min="1" max="{{$sanPham->sp_soluong}}">
                            </li>
                            <li class="list-group-item border-none">Loại: {{ $sanPham->l_ten }}</li>
                            <li class="list-group-item border-none"><button class="btn btn-primary">Thêm vào giỏ hàng</button></li>
                        </ul>
                    </form>
                    <div class="col-12 mt-5 order-3">
                        <h4><b>Mô tả sản phẩm:</b> </h4>
                        <p>{{ $sanPham->sp_mota }}</p>
                    </div>
                </div>
            </div>
        {{-- <div  class="fb-comments" data-href="{{ Request::url()}}" data-numposts="5" data-width=""></div> --}}

        </div>


@endsection
