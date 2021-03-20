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
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">



            <h2 class="text-center" style="margin-bottom: 20px">Sản phẩm tìm được theo tên</h2>
            <form action={{ route('tim-kiem-san-pham')}} method="GET" >
                @csrf
                    <div class="col-9">
                        <div class="form-group">
                            <label>Tìm kiếm</label>
                            <input type="text" class="form-control" name="timKiem" id="formGroupExampleInput" placeholder="Tìm kiếm theo tên">
                        </div>
                    </form>
            <table class="table">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($sanPhamTimDuoc as $item)
                    <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $item->sp_ten }}</td>
                    <td>{{ $item->l_ten }}</td>
                    <td>@if ($item->sp_soluong != 0)
                        {{ $item->sp_soluong}}
                        @else
                        Hết hàng
                        @endif
                      </td>
                    <td>{{ number_format($item->sp_gia) }}</td>

                    <td>
                        @if ($item->sp_hinhanh == null)
                          Chưa có hình ảnh sản phẩm
                      @else
                    <img src="{{ asset('hinhanhsanpham') }}/{{ $item->sp_hinhanh }}" style="width:180px; height=200px">
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('chi-tiet-san-pham', ['id'=>$item->sp_id]) }}" class='btn btn-success'>Chi tiết</a>
                      <a href="{{ route('sua-san-pham', ['id'=>$item->sp_id]) }}" class='btn btn-info'>Sửa</a>
                      <a href="{{ route('xoa-san-pham', ['id'=> $item ->sp_id]) }}"class='btn btn-danger' onclick="return xoa()">Xóa</a>
                    </td>
                    </tr>
                @endforeach


                </tbody>
              </table>
        </div>

    </div>
    </div>

    <script>
        function xoa(){
            const a = confirm("Bạn có muốn xóa không?");
            if(a == true){
                return true;
            }return false;
        }
    </script>

@endsection
