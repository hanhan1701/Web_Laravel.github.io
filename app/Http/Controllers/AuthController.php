<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVienModel;
use Auth;
use Hash;
class AuthController extends Controller
{
    // public function viewdangky()
    // {
    //     return view('admin.template.register');

    // }
    public function viewdangky()
    {
        return view('admin.register');

    }

    public function xulydangky(Request $request)
    {
        $hoTen=$request->hoTen;
        $sdt=$request->sdt;
        $tenDangNhap = $request->tenDangNhap;
        $matKhau1 = $request->matKhau1;
        $matKhau2 = $request->matKhau2;

        if($matKhau1 != $matKhau2)
        {
            // Session::flash('alert-password','Mật khẩu không trùng khớp');
            return redirect()->back();
        }
        else
        {
            $nhanVien = new NhanVienModel();
            $nhanVien->nv_hoten = $hoTen;
            $nhanVien->nv_sdt = $sdt;
            $nhanVien->username = $tenDangNhap;
            $nhanVien->password = Hash::make($matKhau1);
            $nhanVien->q_id = 2;
            //save lai
            $nhanVien->save();
            return redirect()->route('dang-nhap');
            // dd("dang ki thanh cong");
        }

    }
    public function viewdangnhap()
    {

        if(Auth::guard('nhanvien')->check()){
            return redirect()->route('danh-sach-loai');
        }
        return view('admin.login');


    }

    public function xulydangnhap(Request $request)
    {
        $username = $request->username;
        $password= $request->password;
        $arr = [
            'username' => $username,
            'password' => $password
        ];

        //Auth::guard('khachhang')->attempt($arr)

        if (Auth::guard('nhanvien')->attempt($arr)){
            //dd("Đăng nhập thành công");
            return redirect()->route('danh-sach-san-pham');
        }else{
            // dd("dangnhap k thanh cong");
            return view('admin.login');
        }
    }

    public function dangxuat()
    {
        Auth::guard('nhanvien')->logout();
        return redirect()->route('dang-nhap');
    }
}
