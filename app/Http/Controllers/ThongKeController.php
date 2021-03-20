<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class ThongKeController extends Controller
{
    public function index()
    {
        $donHangMoi = DB::table('dathang')->where('dh_trangthai',1)->count();
        $tongDoanhThuThang = DB::table('dathang')->where('dh_trangthai',4)
            ->whereMonth('created_at',Carbon::now()->month)
            ->sum('dh_tongtien');
        $khachHangMoi =DB::table('khachhang')
        ->whereMonth('created_at',Carbon::now()->month)
        ->count();
        $donHangDaGiao = DB::table('dathang')->where('dh_trangthai',4)->count();

        $thongKeDoanhThu=array();
        for($i=1; $i<=12; $i++){
            $doanhThuTheoThang = DB::table('dathang')->whereMonth('created_at',$i)
            ->where('dh_trangthai',4)->sum('dh_tongtien');
            array_push($thongKeDoanhThu,$doanhThuTheoThang);
        }
        //dd($thongKeDonHang);
        $thongKeDonHang=array();
        for($i=1; $i<=12; $i++){
            $donHangTheoThang = DB::table('dathang')->whereMonth('created_at',$i)->count();
            array_push($thongKeDonHang,$donHangTheoThang);
        }
        return view('admin.thongke.index',compact('donHangMoi','donHangDaGiao','tongDoanhThuThang','khachHangMoi','thongKeDonHang','thongKeDoanhThu'));
    }

}
