@extends('admin.template.master')
@section('title')
    <div class="container-fluid">
        <div class="row">
            <div>
                <h2 class="m-0 text-dark text-center" style="margin-bottom: 60px">SẢN PHẨM</h2>
            </div>
        </div>
    </div>
    <div class="col-3">
        <label> Thêm loại sản phẩm</label>
    <button type="submit" data-toggle="modal" data-target="#exampleModal1"class="btn btn-success" style="margin-left: 30px">Thêm</button>
    </div>
    @if (Session::has('alert-themsp'))
                <p style="color: blue" class="text-center">
                    {{Session::get('alert-themsp')}}
                </p>
            @endif

            @if (Session::has('alert-error-themsp'))
                <p style="color: red" class="text-center">
                    {{Session::get('alert-error-themsp')}}
                </p>
            @endif
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">

            @if (Session::has('alert-xoasp'))
            <p style="color: blue" class="text-center">
                {{Session::get('alert-xoasp')}}
            </p>
            @endif

            <h2 class="text-center" style="margin-bottom: 20px">Danh sách sản phẩm</h2>
            {{-- <form action={{ route('tim-kiem-san-pham')}} method="GET" >
                @csrf
                    <div class="col-9">
                        <div class="form-group">
                            <label>Tìm kiếm</label>
                            <input type="text" class="form-control" name="timKiem" id="formGroupExampleInput" placeholder="Tìm kiếm theo tên">
                        </div>
                    </form> --}}
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
                    @foreach ($loaiSanPham as $item)
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
        {{-- <div class="col-3">
            @if (Session::has('alert-themsp'))
                <p style="color: blue" class="text-center">
                    {{Session::get('alert-themsp')}}
                </p>
            @endif

            @if (Session::has('alert-error-themsp'))
                <p style="color: red" class="text-center">
                    {{Session::get('alert-error-themsp')}}
                </p>
            @endif

            <h2 class="text-center" style="margin-bottom: 30px" >Thêm sản phẩm</h2>


            {{-- Khi cần tải file(hình ảnh.....) lên thì xài enctype="multipart/form-data" --}}

        {{-- <form action="{{ route('xu-ly-san-pham') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group" style="margin-bottom: 30px">
                    <label>Tên sản phẩm</label>
                    <input name="tenSanPham" class="form-control mr-sm-2" type="search" placeholder="Nhập tên sản phẩm . . ." aria-label="Search">
                </div>


            <div class="form-group">
                <label>Loại sản phẩm</label>
                <select name="tenLoai" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($danhSachLoai as $item)
                        <option value="{{$item->l_id}}">{{ $item->l_ten }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label> Mô tả</label>

                 <textarea class="form-control" name="moTa" id="mota" cols="8" rows="8" ></textarea>
            </div>

            <div class="form-group">
                <label>Số lượng</label>

                 <textarea name="soLuong" id="soluong" class="form-control" cols="2" rows="2"></textarea>
            </div>

            <div class="form-group">
                <label> Giá</label>

                 <textarea name="gia" id="gia" class="form-control" cols="2" rows="2"></textarea>
            </div>

            <div class="form-group">
            <label for="exampleFormControlFile1">Hình ảnh</label>
                <input type="file" name="hinhAnh" class="form-control-file" id="exampleFormControlFile1">
            </div>



            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        </div>  --}}
    </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('xu-ly-san-pham') }}" method="POST" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">THÊM LOẠI SẢN PHẨM</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="form-group" style="margin-bottom: 30px">
                    <label>Tên sản phẩm</label>
                    <input name="tenSanPham" class="form-control mr-sm-2" type="search" placeholder="Nhập tên sản phẩm . . ." aria-label="Search">
                </div>


                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select name="tenLoai" class="form-control" id="exampleFormControlSelect1">
                        @foreach ($danhSachLoai as $item)
                            <option value="{{$item->l_id}}">{{ $item->l_ten }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label> Mô tả</label>

                    <textarea class="form-control" name="moTa" id="mota" cols="3" rows="3" ></textarea>
                </div>

                <div class="form-group">
                    <label>Số lượng</label>

                    <textarea name="soLuong" id="soluong" class="form-control" cols="2" rows="2"></textarea>
                </div>

                <div class="form-group">
                    <label> Giá</label>

                    <textarea name="gia" id="gia" class="form-control" cols="2" rows="2"></textarea>
                </div>

                <div class="form-group">
                <label for="exampleFormControlFile1">Hình ảnh</label>
                    <input type="file" name="hinhAnh" class="form-control-file" id="exampleFormControlFile1">
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
          </div>
        </form>
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
