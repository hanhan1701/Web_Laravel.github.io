@extends('admin.template.master')
@section('title')
    <div class="container-fluid">
        <div class="row">
            <div>
                <h2 class="m-0 text-dark">LOẠI SẢN PHẨM</h2>
            </div>
        </div>
    </div>
@endsection

@section('content')
  <div class="row ">
    <div class="col-12">
        <h2 class="text-center"> Sửa loại sản phẩm {{ $loaiSanPham->l_ten}}</h2>
    </div>
  </div>

    <div class="col-12">
    <form action="{{route('xu-ly-sua-loai',['id'=>$loaiSanPham->l_id])}}" method="POST">
        @csrf
            <div class="form-group">
                <label>Tên loại</label>
                <input class="form-control" autocomplete="off" value="{{ $loaiSanPham->l_ten}}" name="tenloai" type="search" placeholder="Nhập tên loại son . . ." aria-label="Search">


            </div>


            <button type="submit" class="btn btn-info">Sửa</button>


      </form>
   </div>
@endsection
