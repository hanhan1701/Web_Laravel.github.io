{{-- @extends('admin.template.master')
@section('title')
    <div class="container-fluid">
        <div class="row">
            <div>
                <h2 class="m-0 text-dark text-center" style="margin-bottom: 60px">ĐƠN HÀNG</h2>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <h3 class="text-center">Danh sách đơn hàng được tìm kiếm</h3>
            <form action="{{ route('tim-kiem')}}" method="GET">
                <div class="row">
                    <input type="text" class="form-control col-md-8" name="tuKhoa" placeholder="Tìm kiếm theo...">
                    <select name="thuocTinh" id="">
                        <option value="donHang">Đơn hàng</option>
                        <option value="tenKhachHang">Tên khách hàng</option>
                    </select>
                </div>
            </form>
            <table class="table">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã đơn</th>
                    <th>Tổng tiền</th>
                    <th>Người nhận</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th></th>


                  </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach ($timKiem as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$item->dh_id}}</td>
                        <td>{{$item->dh_tongtien}}</td>
                        <td>{{$item->dh_nguoinhan}}</td>
                        <td>{{$item->dh_sdt}}</td>
                        <td>{{$item->dh_diachi}}</td>
                        <td>
                            @if($item->dh_trangthai==1)
                            Đang chờ duyệt
                        @endif
                        @if($item->dh_trangthai==2)
                            Đã duyệt
                            @endif
                        @if($item->dh_trangthai==3)
                            Đang vận chuyển
                        @endif
                        @if($item->dh_trangthai==4)
                            Đã nhận
                        @endif
                        </td>
                        <td>
                        <a href="{{ route('chi-tiet-don-hang', ['idProduct'=> $item->dh_id]) }}" class="btn btn-primary">Chi tiết đơn</a>
                        </td>

                      </tr>
                    @endforeach

                </tbody>
              </table>
        </div>

    </div>
    </div>


@endsection --}}
