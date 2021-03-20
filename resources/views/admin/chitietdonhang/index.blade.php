@extends('admin.template.master')
@section('title')
    <div class="container-fluid">
        <div class="row">
            <div>
                <h2 class="m-0 text-dark text-center" style="margin-bottom: 60px">CHI TIẾT ĐƠN HÀNG</h2>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row col-12">
         <div class="col-6">

            <label>Người nhận:</label> {{ $donHang->dh_nguoinhan}} <br>
            <label>Số điện thoại:</label> {{ $donHang->dh_sdt}} <br>
            <label>Địa chỉ:</label> {{ $donHang->dh_diachi}} <br>
            <label>Ngày đặt:</label> {{ Carbon\Carbon::parse($donHang->created_at)->format('d/m/Y')}}
        <form action="{{ route('cap-nhat-don-hang',['idDonHang'=>$donHang->dh_id]) }}" method="get">
            <label>Trạng thái:  </label>
            <i>Thay đổi trạng thái đơn hàng</i>
            <select class="form-control" name="trangThai" id="trangThai">
                <option value="1"{{ $donHang->dh_trangthai == '1' ? 'selected': ''}}>Đang chờ duyệt</option>
                <option value="2"{{ $donHang->dh_trangthai == '2' ? 'selected': ''}}>Đã duyệt</option>
                <option value="3"{{ $donHang->dh_trangthai == '3' ? 'selected': ''}}>Đang vận chuyển</option>
                <option value="4"{{ $donHang->dh_trangthai == '4' ? 'selected': ''}}>Đã nhận</option>
            </select>
            <button style="margin-top: 20px; margin-left:220px" type="submit" class="btn btn-info">Cập nhật</button>
        </form>


         </div>
    </div>

    <div class="row col-12">
        <div class="col-12" style="margin-top: 20px">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh sản phẩm</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                        @foreach ($sanPhamDonHang as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$item->sp_ten}}</td>
                        <td><img src="{{ asset('hinhanhsanpham') }}/{{ $item->sp_hinhanh }}" style="width:180px; height=200px"></td>
                        <td>{{ number_format($item->sp_gia)}}</td>
                        <td>{{$item->sp_soluong}}</td>
                        <td>{{ number_format($item->ctdh_giatien)}}</td>

                      </tr>

                    @endforeach
                    <tr>
                        <td colspan="5"><b>Tổng tiền:</b> {{ number_format($donHang->dh_tongtien) }} đ </td>
                    </tr>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
