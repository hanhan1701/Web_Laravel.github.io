<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HanHan Lipstick</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <link rel="stylesheet" href="{{ asset('client-template') }}/login.css">

</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <form action="{{ route('xu-ly-dang-ky-kh') }}" method="POST">
                @csrf
            <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">ĐĂNG KÝ</label>
            <div class="login-form">
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Họ tên</label>
                        <input id="user" name="hoTen" type="text" class="input">
                    </div>

                    <div class="group">
                        <label for="user" class="label">Địa chỉ</label>
                        <input id="user" type="text" name="diaChi" class="input">
                    </div>
                    <div class="group">
                        <label for="user" class="label">Số điện thoại</label>
                        <input id="user" type="number" name="sdt" class="input">
                    </div>
                    <div class="group">
                        <label for="user" class="label">Tài khoản</label>
                        <input id="user" type="text" name="tenDangNhap" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Mật khẩu</label>
                        <input name="matKhau1" id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Nhập lại mật khẩu</label>
                        <input name="matKhau2" id="pass" type="password" class="input" data-type="password">
                    </div>
                    {{-- <div class="group">
                        <label for="pass" class="label">Địa chỉ Email </label>
                        <input id="pass" type="text" class="input">
                    </div> --}}
                    <div class="group">
                        <input type="submit" class="button" value="Đăng ký">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>

</html>
