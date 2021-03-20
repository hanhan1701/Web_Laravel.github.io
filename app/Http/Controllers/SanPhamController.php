<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaiSanPham = DB::table('sanpham')
            ->join('loaisanpham','loaisanpham.l_id','sanpham.l_id')
            ->get();
        $danhSachLoai = DB::table('loaisanpham')->get();
        //dd($loaiSanPham);
        return view('admin.sanpham.index',compact('loaiSanPham','danhSachLoai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $tenSanPham= $request->tenSanPham;
            $tenLoai= $request->tenLoai;
            $moTa= $request->moTa;
            $hinhAnh= $request->hinhAnh;
            $soLuong= $request->soLuong;
            $gia= $request->gia;

            if($hinhAnh !=null){
                $tenHinhAnh = $hinhAnh->getClientOriginalName();
                $hinhAnh -> move('hinhanhsanpham', $tenHinhAnh);
                $addSanPham = DB::table('sanpham')->insert(
                    [
                    'sp_ten' => $tenSanPham,
                    'l_id'=> $tenLoai,
                    'sp_mota'=> $moTa,
                    'sp_hinhanh' => $tenHinhAnh,
                    'sp_soluong' => $soLuong,
                    'sp_gia' => $gia
                    ]
                );
            }
            else{
                $addSanPham= DB::table('sanpham')->insert([
                    'sp_ten'=> $tenSanPham,
                    'l_id' => $tenLoai,
                    'sp_mota'=>$moTa,
                    'sp_soluong' => $soLuong,
                    'sp_gia' => $gia
                ]);
            }
        //dd('Them thanh cong');
            Session::flash('alert-themsp','Thêm thành công');
            return redirect()->route('danh-sach-san-pham');
        }catch (\Throwable $th) {
        Session::flash('alert-error-themsp','Có lỗi trong quá trình thêm');
        return redirect()->route('danh-sach-san-pham');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sanPham = DB::table('sanpham')
                        ->where('sp_id',$id)
                        ->join ('loaisanpham','loaisanpham.l_id','sanpham.l_id')->first();
        return view('admin.sanpham.detail',compact('sanPham'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sanPham = DB::table('sanpham')->where('sp_id',$id) ->join('loaisanpham','loaisanpham.l_id','sanpham.l_id')->first();
        $loaisp=DB::table('loaisanpham')->get();
        return view('admin.sanpham.edit',compact('sanPham','loaisp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hinhAnh = $request ->hinhAnh;
        $tenSanPham = $request ->tenSanPham;
        $loaiSanPham = $request ->tenLoai;
        $soLuong = $request->soLuong;
        $gia = $request->gia;
        if($hinhAnh == '')
        {
            $editSanPham = DB::table('sanpham')->where('sp_id',$id)->update([
                'sp_ten' => $tenSanPham,
                'l_id' => $loaiSanPham,
                'sp_soluong' => $soLuong,
                'sp_gia' => $gia
            ]);
            return redirect()->route('danh-sach-san-pham');
        }
        else
        {
            $tenHinhAnh = $hinhAnh->getClientOriginalName();
            $hinhAnh -> move('hinhanhsanpham',$tenHinhAnh);
            $editSanPham = DB::table('sanpham')->where('sp_id',$id)->update([
                'sp_ten' => $tenSanPham,
                'l_id' => $loaiSanPham,
                'sp_hinhanh' => $tenHinhAnh,
                'sp_soluong' => $soLuong,
                'sp_gia' => $gia
            ]);
            return redirect()->route('danh-sach-san-pham');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delSanPham = DB::table('sanpham')->where('sp_id', $id)->delete();
        Session::flash('alert-xoasp','Xóa thành công');
        return redirect()->route('danh-sach-san-pham');
    }

    public function timKiem(Request $request)
    {
        $tuKhoa = $request -> get('tuKhoa');
        $sanPhamTimDuoc= DB::table('sanpham') ->join('loaisanpham','loaisanpham.l_id','sanpham.l_id')->where('sp_ten','like','%'.$tuKhoa.'%')->get();
        //dd($sanPhamTimDuoc);
        return view('admin.sanpham.timkiem',compact('sanPhamTimDuoc','tuKhoa'));

    }
}
