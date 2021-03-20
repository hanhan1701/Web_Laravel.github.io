<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHangModel;
use Auth;
use Hash;
class KhachHangController extends Controller
{
    public function viewdangky()
    {
        return view('client.register');

    }
    public function xulydangky(Request $request)
    {
        $hoTen=$request->hoTen;
        $diaChi=$request->diaChi;
        $sdt=$request->sdt;
        $tenDangNhap = $request->tenDangNhap;
        $matKhau1 = $request->matKhau1;
        $matKhau2 = $request->matKhau2;

        if($matKhau1 != $matKhau2)
        {
            //Session::flash('alert-password','Mật khẩu không trùng khớp');
            return redirect()->back();
        }
        else
        {
            $khachHang = new KhachHangModel();
            $khachHang->kh_hoten = $hoTen;
            $khachHang->kh_diachi = $diaChi;
            $khachHang->kh_sdt = $sdt;
            $khachHang->username = $tenDangNhap;
            $khachHang->password = Hash::make($matKhau1);
            // $khachHang->q_id = 2;
            //save lai
            $khachHang->save();
            return redirect()->route('dang-nhap-kh');
            // dd("dang ki thanh cong");
        }
    }
    public function viewdangnhap()
    {
        return view('client.login');

    }
    public function xulydangnhapkh(Request $request)
    {
        $username = $request->username;
        $password= $request->password;

        $arr = [
            'username' => $username,
            'password' => $password
        ];

        //Auth::guard('khachhang')->attempt($arr)

        if (Auth::guard('khachhang')->attempt($arr)){
            //dd("Đăng nhập thành công");
            return redirect()->route('trang-chu');
        }else{
            //dd("Tài khoản và mật khẩu chưa chính xác");
            return view('client.login');
        }
    }
    public function logoutkh()
    {
        Auth::guard('khachhang')->logout();
        return redirect()->route('trang-chu');
    }
}
