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
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Sửa sản phẩm {{ $sanPham->sp_id }}</h2>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('xu-ly-sua-sp', ['id'=>$sanPham->sp_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label for="exampleInputTenloai">Tên Sản Phẩm</label>
                            <input type="text" autocomplete="off" value="{{ $sanPham->sp_ten }}" name="tenSanPham"  class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập tên loại son...">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputTenloai">Loại Sản Phẩm</label>
                                <select name="tenLoai" id=""class="form-control">
                                    @foreach ($loaisp as $item)
                                        {{-- <option value="{{ $item->l_id }}">{{ $item->l_ten }}</option> --}}
                                        <option value="{{ $item->l_id }}" {{ $sanPham->l_id == $item->l_id ? 'selected' : ''}}>{{ $item->l_ten }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputTenloai">Số lượng</label>
                                <input type="text" autocomplete="off" value="{{ $sanPham->sp_soluong }}" name="soLuong"  class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập số lượng...">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputTenloai">Giá</label>
                                <input type="text" autocomplete="off" value="{{ $sanPham->sp_gia }}" name="gia"  class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập giá...">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Hình ảnh</label>
                                <img src="{{asset('hinhanhsanpham')}}/{{$sanPham->sp_hinhanh}}" style = "width:150px">
                                <input type="file" name="hinhAnh" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <button type="submit" class="btn btn-info">Sửa</button>
                        </form>
                    </div>
                </div>
@endsection
