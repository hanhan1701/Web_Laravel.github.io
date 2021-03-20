@extends('client.template.master')
@section('content')
<h1 class="text-center"> Sản phẩm</h1>
<div class="htc__product__container">
    <div class="row">
        <div class="product__list clearfix mt--30">
            <!-- Start Single Category -->
            @foreach($sanPhamTC as $item)
            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                <div class="category">
                    <div class="ht__cat__thumb">
                        <a href="{{ route('chi-tiet',['id'=>$item->sp_id])}}">
                            <img src="{{ asset('hinhanhsanpham') }}/{{ $item->sp_hinhanh }}" alt="product images">
                        </a>
                    </div>
                    <div class="fr__hover__info">
                        <ul class="product__action">
                            <li><a href="" ><i class="icon-heart icons"></i></a></li>
                            @if($item->sp_soluong<=0)
                            <button class="btn btn-danger" >Hết hàng</button>
                            @else

                            <li><a href="{{ route('them-vao-gio-hang',['idProduct'=>$item->sp_id])}}" title="Thêm vào giỏ"><i class="icon-handbag icons"></i></a></li>
                            @endif
                            <li><a href="{{ route('chi-tiet',['id'=>$item->sp_id])}}" title="Chi tiết"><i class="icon-shuffle icons"></i></a></li>
                        </ul>
                    </div>
                    <div class="fr__product__inner">
                        {{-- <h4><a href="product-details.html">Largest Water Pot</a></h4> --}}
                        <h4><a href="{{ route('chi-tiet',['id'=>$item->sp_id])}}">{{ $item->sp_ten}}</a></h4>
                        <p><a href="{{ route('chi-tiet',['id'=>$item->sp_id])}}">{{ number_format($item->sp_gia) }}</a></p>
                        {{-- <p><a href="">Số lượng: {{ $item->sp_soluong }}</a></p> --}}

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
