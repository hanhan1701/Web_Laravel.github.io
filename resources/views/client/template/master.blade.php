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
    @include('client.template.css')

</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        @include('client.template.header')
        <!-- End Header Area -->

        <!-- Start Offset Wrapper -->

        <!-- End Offset Wrapper -->
        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            @yield('slider')
        </div>
        {{-- @include('client.template.slider') --}}
        <!-- Start Slider Area -->
        <!-- Start Category Area -->

        <!-- End Category Area -->
        <!-- Start Prize Good Area -->
        @yield('content')
        <!-- End Blog Area -->
        <!-- End Banner Area -->
        <!-- Start Footer Area -->
        @include('client.template.footer')
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->
    @include('client.template.js')


</body>

</html>
