@extends('client.template.master')
@section('content')
    <h1 class="text-center" style="margin-top: 60px">THANH TOÁN</h1>
    <div class="row"  style="margin-left: 30px">
        <div class="col-md-9">
            <h2 style="margin-top: 30px">Thông tin sản phẩm</h2>
            <label style="color: red;">Vui lòng kiểm tra lại giỏ hàng</label>
            <table class="table">
                <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Giá</th>
                </tr>
                @php
                    $stt = 1;
                @endphp
                @foreach ($cartCollection as $item)
                    <tr class="sanpham">
                        <td>{{ $stt++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                        <p id="donGia">{{ number_format($item->price) }} đ</p>
                        </td>
                        <td>
                            {{ $item->quantity }}
                        </td>
                        <td>
                            <p>
                                {{ number_format($item->getPriceSum()) }} đ
                            </p>
                        </td>
                    </tr>
                @endforeach

                    <tr>
                        <td colspan="5"><b>Tổng tiền thanh toán:</b> {{ number_format(Cart::getSubTotal()) }} đ </td>
                    </tr>
            </table>
        </div>
        <div class="col-md-9">
            <h2>Thông tin người nhận</h2>
            <form method="POST" action="{{ route('dat-hang') }}">
                @csrf
                <div class="form-group">
                    <label>Họ tên: </label>
                    <input type="text" class="form-control" name="nguoiNhan" value="{{ Auth::guard('khachhang')->user()->kh_hoten }}">
                </div>
                <div class="form-group">
                    <label>Số điện thoại: </label>
                    <input type="text" class="form-control" name="sdt" value="{{ Auth::guard('khachhang')->user()->kh_sdt }}">
                </div>
                <div class="form-group">
                    <label>Địa chỉ: </label>
                    <input type="text" class="form-control" name="diaChi" value="{{ Auth::guard('khachhang')->user()->kh_diachi }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Đặt hàng</button>
                </div>
            </form>
        </div>
    </div>
@endsection
