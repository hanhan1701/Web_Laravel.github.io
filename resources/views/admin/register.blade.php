<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin || HanHan Lipstick</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <link rel="stylesheet" href="{{ asset('admin-template') }}/style.css">
</head>

<body>
    <div class="materialContainer">

            <form action="{{ route('xu-ly-dang-ky') }}" method="POST">
                @csrf
                <div class="box">
                    <div class="title" style="margin-top:0.5px">ĐĂNG KÝ</div>
                    <div class="input">
                        <label for="regname" >Họ và tên</label>
                        <input type="text" name="hoTen" id="regname">
                        <span class="spin"></span>
                     </div>
                    <div class="input" style="margin-top:0.5px">
                       <label for="regname">Tài khoản</label>
                       <input type="text" name="tenDangNhap" id="regname">
                       <span class="spin"></span>
                    </div>

                    <div class="input" style="margin-top:0.5px">
                        <label for="regpass">Số điện thoại</label>
                        <input type="text" name="sdt" id="number">
                        <span class="spin"></span>
                     </div>

                    <div class="input" style="margin-top:0.5px">
                       <label for="regpass">Mật khẩu</label>
                       <input type="password" name="matKhau1" id="regpass">
                       <span class="spin"></span>
                    </div>

                    <div class="input" style="margin-top:0.5px">
                       <label for="reregpass">Nhập lại mật khẩu </label>
                       <input type="password" name="matKhau2" id="reregpass">
                       <span class="spin"></span>
                    </div>

                    <div class="button login" style="margin-top:0.5px">
                        <button><a  type="submit"  class="btn btn-sm btn-outline-success">ĐĂNG KÝ</a></button>
                     </div>

                </div>
            </form>
    </div>
    <script src="{{ asset('admin-template') }}/js.js"></script>

</body>
</html>
