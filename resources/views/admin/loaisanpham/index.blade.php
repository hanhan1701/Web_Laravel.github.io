@extends('admin.template.master')
@section('title')
    <div class="container-fluid">
        <div class="row">
            <div>
                <h2 class="m-0 text-dark text-center">LOẠI SẢN PHẨM</h2>
            </div>
        </div>
    </div>


    @if (Session::has('alert-capnhat'))
            <p style="color: blue " class="text-center">
            {{Session::get('alert-capnhat')}}
            </p>
    @endif

    @if (Session::has('alert-error-capnhat'))
            <p style="color: red" class="text-center">
            {{Session::get('alert-error-capnhat')}}
            </p>
    @endif

    @if (Session::has('alert-them'))
    <p style="color: blue" class="text-center">
        {{Session::get('alert-them')}}
    </p>
@endif

@if (Session::has('alert-error-them'))
    <p style="color: red" class="text-center">
        {{Session::get('alert-error-them')}}
    </p>
@endif

@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Danh sách loại sản phẩm</h2>
            <form action={{ route('tim-kiem-loai-san-pham')}} method="GET" >
                @csrf
                    <div class="col-9">
                        <div class="form-group">
                            <label>Tìm kiếm</label>
                            <input type="text" class="form-control" name="timKiem" id="formGroupExampleInput" placeholder="Tìm kiếm theo tên">
                        </div>
                    </form>
                    </div>
                    <div class="col-3">
                        <label> Thêm loại sản phẩm</label>
                    <button type="submit" data-toggle="modal" data-target="#exampleModal"class="btn btn-success" style="margin-left: 30px">Thêm</button>
                    </div>
            {{-- <label> Thêm loại sản phẩm</label><br>
            <button type="submit" data-toggle="modal" data-target="#exampleModal"class="btn btn-primary">Thêm</button> --}}
            <table class="table" style="margin-top: 30px">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tên loại son</th>
                    <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                @foreach ($danhSachLoai as $item)
                <tr>
                    <th>{{ $i++ }}</th>
                    <th scope="row">{{$item->l_id}}</th>
                    <td>{{ $item->l_ten }}</td>
                    <td>
                        <a href="{{route('sua-loai-san-pham', ['id'=> $item ->l_id]) }}" class="btn btn-info">Sửa</a>
                        <a href="{{ route('xoa-loai-san-pham', ['id'=> $item ->l_id]) }}" class="btn btn-danger" onclick="return xoa()">Xóa</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- <div class="col-4">
            @if (Session::has('alert-them'))
                <p style="color: blue" class="text-center">
                    {{Session::get('alert-them')}}
                </p>
            @endif

            @if (Session::has('alert-error-them'))
                <p style="color: red" class="text-center">
                    {{Session::get('alert-error-them')}}
                </p>
            @endif

           <h2 class="text-center">Thêm</h2>
            <form action="{{route('xu-ly-them-loai')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên loại</label>
                    <input class="form-control" name="tenloai" type="search" placeholder="Nhập tên loại son . . ." aria-label="Search">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div> --}}
    </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('xu-ly-them-loai')}}" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">THÊM LOẠI SẢN PHẨM</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="col-8">
                    {{-- <h3 class="text-center">Thêm</h3> --}}
                    @if (Session::has('alert'))
                        <p style="color: green" class="text-center">
                        {{Session::get('alert')}}
                        </p>

                    @endif

                    @if (Session::has('alert-error'))
                        <p style="color: red" class="text-center">
                        {{Session::get('alert-error')}}
                    </p>

                    @endif


                        @csrf
                            <div class="form-group">
                                <label>Tên loại</label>

                                <input class="form-control mr-sm-2" name="tenloai" type="search" placeholder="Nhập tên loại sản phẩm . . ." aria-label="Search">


                            </div>



                   </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-info">Thêm</button>
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
