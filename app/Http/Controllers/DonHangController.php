<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DonHangController extends Controller
{
    public function donHang()
    {
        $donHang = DB::table('dathang')->get();
        return view('admin.donhang.index', compact('donHang'));
    }

    public function chiTietDonHang($idDonHang)
    {
        //lay thong tin dơn hang
        $donHang= DB::table('dathang')->where('dh_id',$idDonHang)->first();
        //láy sp trong thong tin don hang
        $sanPhamDonHang = DB::table('chitietdathang')
        ->join('sanpham','sanpham.sp_id','chitietdathang.sp_id')
        ->where('chitietdathang.dh_id',$idDonHang)
        ->get();
        //dd($donHang);
        //dd($sanPhamDonHang);
        return view('admin.chitietdonhang.index', compact('donHang','sanPhamDonHang'));
    }

    public function capNhatTrangThai($idDonHang, Request $request)
    {
        $donHang = DB::table('dathang')->where('dh_id',$idDonHang)->update([
            'dh_trangthai' =>$request->get('trangThai')
        ]);
        // return redirect()->back();
        return redirect()->route('don-hang');
    }
    // public function timKiem(Request $request)
    // {
    //     switch ($request ->get('thuocTinh')) {
    //         case 'donHang':
    //             # code...
    //             $timKiem= DB::table('dathang')->where('dh_id',$request->get('tuKhoa'))->get();
    //             // dd($search);
    //             return view('admin.donhang.timkiemdonhang',compact('timKiem'));
    //         break;
    //         case 'tenKhachHang':
    //             # code...
    //             $timKiem= DB::table('dathang')->where('dh_nguoinhan','like','%'.$request->get('tuKhoa').'%')->get();
    //             //dd($search);
    //             return view('admin.donhang.timkiemdonhang',compact('timKiem'));
    //         break;


    //         default:
    //             # code...
    //             break;
    //     }

    // }

}
