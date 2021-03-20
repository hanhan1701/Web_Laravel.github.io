@extends('admin.template.master')
@section('title')
    <div class="container-fluid">
        <div class="row">
            <div>
                <h2 class="m-0 text-dark text-center" style="margin-bottom: 60px">LOẠI SẢN PHẨM</h2>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Loại sản phẩm tìm được theo tên </h2>
                <form action={{ route('tim-kiem-loai-san-pham')}} method="GET" >
                    @csrf
                    <div class="form-group">
                        <label>Tìm kiếm</label>
                        <input type="text" class="form-control" name="tuKhoa" id="formGroupExampleInput" placeholder="Tìm kiếm loại sản phẩm theo tên...">
                    </div>

                </form>


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tên loại sản phẩm</th>
                    <th>Thao tác</th>

                </tr>
                </thead>
                <tbody>

                @php
                    $i = 1
                @endphp
                @foreach ($loaiSanPhamTimDuoc as $item)
                <tr>
                    <th>{{ $i++ }}</th>
                    <th scope="row">{{$item->l_id}}</th>
                    <td>{{ $item->l_ten }}</td>
                    <td>
                        <a href="{{ route('sua-loai-san-pham', ['id'=> $item ->l_id]) }}" class="btn btn-info">Sửa</a>
                        <a href="{{ route('xoa-loai-san-pham', ['id'=> $item ->l_id]) }}" class="btn btn-danger" onclick="return xoa()">Xóa</a>
                    </td>
                  </tr>
                @endforeach


            </tbody>
          </table>
       </div>

       {{-- <div class="col-4">
            <h2 class="text-center">Thêm</h2>
            <form action="{{route('xu-ly-them-loai')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên loại</label>
                    <input class="form-control mr-sm-2" name="tenloai" type="search" placeholder="Nhập tên loại sản phẩm . . ." aria-label="Search">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
       </div> --}}
    </div>
    </div>
   {{-- xóa hay k --}}
   <script>
       function xoa(){
           const a = confirm("Bạn có muốn xóa không?");
           if(a == true){
               return true;
           }return false;
       }
   </script>
@endsection
