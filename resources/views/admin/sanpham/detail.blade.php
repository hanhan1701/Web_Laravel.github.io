@extends('admin.template.master')
@section('title')
    <div class="container-fluid">
        <div class="row">
            <div>
                <h2 class="m-0 text-dark text-center" style="margin-bottom: 60px">SẢN PHẨM</h2>
            </div>
        </div>
    </div>
@endsection

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-1">
                    <div class="image_selected">
                        <img src="{{ asset('hinhanhsanpham') }}/{{ $sanPham->sp_hinhanh }}" style="width:350px;height:350px">
                    </div>
                </div>
                <!-- Description -->
                <div class="col-md-6 order-2">
                    <form>
                        <ul class="list-group mt-5">
                            <li class="list-group-item border-none"><b>Thông tin sản phẩm</b></li>
                            <li class="list-group-item border-none"><label> Giá: </label> {{ number_format($sanPham->sp_gia) }}</li>
                            <li class="list-group-item border-none">
                               <label>Số lượng: </label> {{$sanPham->sp_soluong}}
                            </li>
                            <li class="list-group-item border-none"><label>Loại: </label> {{ $sanPham->l_ten }}</li>
                        </ul>
                    </form>
                    <div class="col-md-12 mt-5 order-3">
                        <h4><b>Mô tả sản phẩm:</b> </h4>
                        <p>{{ $sanPham->sp_mota }}</p>
                    </div>
                </div>
            </div>

        </div>


@endsection
