@extends('client.template.master')
@section('content')
     {{-- <div class="col-md-12 "> --}}
        <h1 class="text-center" style="margin-top: 60px">GIỎ HÀNG</h1>
        <table class="table">
            <tr>
            <th></th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Giá</th>
            <th></th>
            </tr>
            @php
            $stt =1;
            @endphp
            @foreach ($cartCollection as $item)
            <tr class="sanpham">
            <td>{{ $stt++ }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>
            <p>{{ number_format($item->price)}}</p>
            </td>
            <td>
                <p>{{ number_format($item->getPriceSum())}}</p>
            </td>
            <td>
                <a href="{{ route('xoa-mot-san-pham', ['idProduct'=>$item->id])}}" class="btn btn-danger" >X</a>
            </td>


            </tr>
            @endforeach

            <tr>
            <td colspan="3" class="text-center"><label>TỔNG TIỀN:</label>{{ number_format(Cart::getSubTotal())}} </td>
            {{-- <td colspan="1"><a class="btn btn-primary" href="#">Cập nhật</a></td> --}}

            @if (Auth::guard('khachhang')->check())
            <td colspan="1"><a class="btn btn-info" href="{{ route('thanh-toan')}}">Thanh toán</a></td>
            @else
            <td colspan="1"><a class="btn btn-info" href="{{ route('dang-nhap-kh')}}">Thanh toán</a></td>
            @endif

            <td></td>


            </tr>
        </table>
    {{-- </div> --}}

@endsection
