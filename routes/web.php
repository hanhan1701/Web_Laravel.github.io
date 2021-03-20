<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/login', function () {
//     return view('client.login');
// });
// Route::get('/dangkykh', function () {
//     return view('client.register');
// });

//////////////////ĐĂNG KÝ ĐĂNG NHẬP ADMIN
Route::get('/dangky','AuthController@viewdangky')->name('dang-ky');
Route::post('/xu-ly-dang-ky','AuthController@xulydangky')->name('xu-ly-dang-ky');

Route::get('/dangnhap','AuthController@viewdangnhap')->name('dang-nhap');
Route::post('/xu-ly-dang-nhap','AuthController@xulydangnhap')->name('xu-ly-dang-nhap');
Route::get('/dangxuat','AuthController@dangxuat')->name('dang-xuat');


Route::group(['middleware' => ['checkNhanVien']], function () {
    Route::group(['prefix' => 'loaisanpham'], function () {
        Route::get('/loaisanpham','LoaiSanPhamController@index')->name('danh-sach-loai');
        Route::post('/xu-ly-them-loai','LoaiSanPhamController@store')->name('xu-ly-them-loai');
        Route::get('/sua-loai-san-pham/{id}','LoaiSanPhamController@edit')->name('sua-loai-san-pham');
        Route::post('/xu-ly-sua-loai/{id}','LoaiSanPhamController@update')->name('xu-ly-sua-loai');
        Route::get('/xoa-loai-san-pham/{id}','LoaiSanPhamController@destroy')->name('xoa-loai-san-pham');
        Route::get('/tim-kiem-loai-san-pham','LoaiSanPhamController@timKiem')->name('tim-kiem-loai-san-pham');
    });
    Route::group(['prefix' => 'sanpham'], function () {
        Route::get('/sanpham','SanPhamController@index')->name('danh-sach-san-pham');
        Route::post('/xu-ly-san-pham','SanPhamController@store')->name('xu-ly-san-pham');
        Route::get('/sua-san-pham/{id}','SanPhamController@edit')->name('sua-san-pham');
        Route::post('/xu-ly-sua-sp/{id}','SanPhamController@update')->name('xu-ly-sua-sp');
        Route::get('/xoa-san-pham/{id}','SanPhamController@destroy')->name('xoa-san-pham');
        Route::get('/chi-tiet-san-pham/{id}','SanPhamController@show')->name('chi-tiet-san-pham');
        Route::get('/xoa-san-pham/{id}','SanPhamController@destroy')->name('xoa-san-pham');
        // Route::get('/tim-kiem-san-pham','SanPhamController@timKiem')->name('tim-kiem-san-pham');

    });
    Route::group(['prefix' => 'donhang'], function () {
        Route::get('/donhang','DonHangController@donHang')->name('don-hang');
        Route::get('/chitietdonhang/{idDonHang}','DonHangController@chiTietDonHang')->name('chi-tiet-don-hang');
        Route::get('/capnhatdonhang/{idDonHang}','DonHangController@capNhatTrangThai')->name('cap-nhat-don-hang');
        // Route::get('/donhangKH/{idCus}','KhachHangController@getOrderByCus')->name('don-hang-kh');
        Route::get('/timkiemtheoten','DonHangController@timKiem')->name('tim-kiem');
    });
    Route::group(['prefix' => 'thongke'], function () {
        Route::get('/thongke','ThongKeController@index')->name('thong-ke');
    });

});

Route::get('/','TrangChuController@index')->name('trang-chu');
Route::get('/themvaogiohang/{idProduct}','TrangChuController@addToCart')->name('them-vao-gio-hang');
Route::get('/giohang','TrangChuController@giohang')->name('gio-hang');
Route::get('/xoamotsp/{idProduct}','TrangChuController@clearOneCart')->name('xoa-mot-san-pham');
Route::get('/laysp/{idLoai}','TrangChuController@getProductCategory')->name('lay-sp-trong-loai');
Route::get('/sanpham','TrangChuController@sanPham')->name('san-pham');
Route::get('/lienhe','TrangChuController@lienHe')->name('lien-he');
Route::get('/chi-tiet/{id}','TrangChuController@show')->name('chi-tiet');
Route::get('/themspvaocart/{idProduct}','TrangChuController@addMoreProductToCart')->name('them-sp-vao-cart');
Route::get('/thanhtoan','TrangChuController@thanhToan')->name('thanh-toan');
Route::post('/dathang','TrangChuController@datHang')->name('dat-hang');

Route::get('/dangnhapkh','KhachHangController@viewdangnhap')->name('dang-nhap-kh');
Route::post('/xu-ly-dang-nhap-KH','KhachHangController@xulydangnhapkh')->name('xu-ly-dang-nhap-kh');

Route::get('/dangkykh','KhachHangController@viewdangky')->name('dang-ky-kh');
Route::post('/xu-ly-dang-ky-kh','KhachHangController@xulydangky')->name('xu-ly-dang-ky-kh');

Route::get('/logoutkh','KhachHangController@logoutkh')->name('dang-xuat-kh');

// Route::get('/donhang','DonHangController@donHang')->name('don-hang');
// Route::get('/chitietdonhang/{idDonHang}','DonHangController@chiTietDonHang')->name('chi-tiet-don-hang');
// Route::get('/capnhatdonhang/{idDonHang}','DonHangController@capNhatTrangThai')->name('cap-nhat-don-hang');
// // Route::get('/donhangKH/{idCus}','KhachHangController@getOrderByCus')->name('don-hang-kh');
// Route::get('/timkiemtheoten','DonHangController@timKiem')->name('tim-kiem');
