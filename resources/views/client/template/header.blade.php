<header id="htc__header" class="htc__header__area header--one">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                        <div class="logo">
                             <a href="index.html"><img src="{{ asset('client-template') }}/images/logo/4.png" alt="logo images"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                            <li class="drop"><a href="{{ route('trang-chu')}}">Trang chủ</a></li>
                                <li class="drop"><a href="{{ route('san-pham')}}">Sản phẩm</a>

                                    {{-- <ul class="dropdown mega_dropdown">
                                        <!-- Start Single Mega MEnu -->
                                        <li><a class="mega__title" href="product-grid.html">Son lì</a>
                                            <ul class="mega__item">
                                                <li><a href="product-grid.html">Lưới sản phẩm</a></li>
                                                <li><a href="cart.html">Giỏ hàng</a></li>
                                                <li><a href="checkout.html">Thanh toán</a></li>
                                            </ul>
                                        </li>
                                        <!-- End Single Mega MEnu -->
                                        <!-- Start Single Mega MEnu -->
                                        <li><a class="mega__title" href="product-grid.html">Sản phẩm mới</a>
                                            <ul class="mega__item">
                                                <li><a href="#">Loại</a></li>
                                                <li><a href="#">My Account</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="cart.html">Shopping Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <!-- End Single Mega MEnu -->
                                        <!-- Start Single Mega MEnu -->
                                        <li><a class="mega__title" href="product-grid.html">Loại son</a>
                                            <ul class="mega__item">
                                                <li><a href="#">Simple Product</a></li>
                                                <li><a href="#">Variable Product</a></li>
                                                <li><a href="#">Grouped Product</a></li>
                                                <li><a href="#">Downloadable Product</a></li>
                                                <li><a href="#">Simple Product</a></li>
                                            </ul>
                                        </li>
                                        <!-- End Single Mega MEnu -->
                                    </ul> --}}

                                </li>
                                <li class="drop"><a href="#">Loại sản phẩm</a>
                                    <ul class="dropdown">
                                        @foreach ($loaisanpham as $item)
                                        <li><a href="{{ route('lay-sp-trong-loai',['idLoai'=>$item->l_id])}}">{{ $item->l_ten }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                               {{-- <li class="drop"><a href="#">Giới thiệu</a> --}}

                                    {{-- <ul class="dropdown">
                                        <li><a href="product-grid.html">Product Grid</a></li>
                                        <li><a href="product-details.html">Product Details</a></li>
                                    </ul> --}}

                                {{-- </li> --}}
                                {{-- <li class="drop"><a href="blog.html">blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog.html">Blog Grid</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                        <li><a href="cart.html">Cart page</a></li>
                                        <li><a href="checkout.html">checkout</a></li>
                                        <li><a href="contact.html">contact</a></li>
                                        <li><a href="product-grid.html">product grid</a></li>
                                        <li><a href="product-details.html">product details</a></li>
                                        <li><a href="wishlist.html">wishlist</a></li>
                                    </ul>
                                {{-- </li> --}}
                                <li><a href="{{ route('lien-he')}}">Liên hệ</a></li>
                            </ul>
                        </nav>

                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            {{-- <nav id="mobile_dropdown">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="#">pages</a>
                                        <ul>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                            <li><a href="cart.html">Cart page</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                            <li><a href="product-grid.html">product grid</a></li>
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </nav> --}}
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                            {{-- <div class="header__search search search__open">
                            <a href="#"><i class="icon-magnifier icons"></i></a>
                            </div> --}}

                            @if (Auth::guard('khachhang')->check())
                            <div class="header__account">
                            <a href="{{ route('dang-xuat-kh')}}"><i class="icon-user icons"></i>{{ Auth::guard('khachhang')->user()->username}}</a>

                            </div>
                            <div class="htc__shopping__cart">
                                <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                <a href="{{ route('gio-hang') }}"><span class="htc__qua">{{ Cart::getTotalQuantity() }}</span></a>
                            </div>
                            @else
                            <div class="header__account">
                                <a href="{{ route('dang-nhap-kh')}}"><i class="icon-user icons"></i></a>

                                </div>

                                <div class="htc__shopping__cart">
                                    <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                    <a href="{{ route('gio-hang') }}"><span class="htc__qua">{{ Cart::getTotalQuantity() }}</span></a>
                                </div>
                                @endif
                            {{-- <div class="htc__shopping__cart">
                                <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                <a href="{{ route('gio-hang') }}"><span class="htc__qua">{{ Cart::getTotalQuantity() }}</span></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>

