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

        <form action="{{ route('xu-ly-dang-nhap') }}" method="POST">
            @csrf
            <div class="box">

            <div class="title">ĐĂNG NHẬP</div>

           <div class="input">
              <label for="name">Tài khoản</label>
              <input type="text" name="username" id="name">
              <span class="spin"></span>
           </div>

           <div class="input">
              <label for="pass">Mật khẩu</label>
              <input type="password" name="password" id="pass">
              <span class="spin"></span>
           </div>

           <div class="button login">
            <button><a  href="{{route('danh-sach-loai')}}" class="btn btn-sm btn-outline-success">ĐĂNG NHẬP</a></button>
            {{-- <button style="margin-left: 40px"><a  href="{{route('dang-ky')}}" class="btn btn-sm btn-outline-success">ĐĂNG KÝ</a></button> --}}
           </div>

           {{-- <a href="" class="pass-forgot">Quên mật khẩu</a> --}}

        </div>


        </form>
    </div>
    <script src="{{ asset('admin-template') }}/js.js"></script>

</body>
</html>
