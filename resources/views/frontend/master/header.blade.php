<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="h-100 d-md-flex justify-content-between align-items-center">
            <div class="email-address">
                <a href="mailto:contact@southtemplate.com">contact@southtemplate.com</a>
            </div>
            <div class="phone-number d-flex">
                <div class="icon">
                    <img src="img/icons/phone-call.png" alt="">
                </div>
                <div class="number">
                    <a href="tel:+45 677 8993000 223">+45 677 8993000 223</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="southNav">

                <!-- Logo -->
                <a class="nav-brand" href="{{ route('index') }}"><img src="img/core-img/logo.png" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{ route('index') }}">Trang chủ</a></li>
                            {{-- <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="#">Listings</a>
                                        <ul class="dropdown">
                                            <li><a href="listings.html">Listings</a></li>
                                            <li><a href="single-listings.html">Single Listings</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="single-blog.html">Single Blog</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="elements.html">Elements</a></li>
                                </ul>
                            </li> --}}
                            <li><a href="about-us.html">Giới thiệu</a></li>
                            {{-- <li><a href="listings.html">Properties</a></li>
                            <li><a href="blog.html">Blog</a></li> --}}
                            {{-- <li><a href="#">Mega Menu</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Headline 1</li>
                                        <li><a href="#">Mega Menu Item 1</a></li>
                                        <li><a href="#">Mega Menu Item 2</a></li>
                                        <li><a href="#">Mega Menu Item 3</a></li>
                                        <li><a href="#">Mega Menu Item 4</a></li>
                                        <li><a href="#">Mega Menu Item 5</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Headline 2</li>
                                        <li><a href="#">Mega Menu Item 1</a></li>
                                        <li><a href="#">Mega Menu Item 2</a></li>
                                        <li><a href="#">Mega Menu Item 3</a></li>
                                        <li><a href="#">Mega Menu Item 4</a></li>
                                        <li><a href="#">Mega Menu Item 5</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Headline 3</li>
                                        <li><a href="#">Mega Menu Item 1</a></li>
                                        <li><a href="#">Mega Menu Item 2</a></li>
                                        <li><a href="#">Mega Menu Item 3</a></li>
                                        <li><a href="#">Mega Menu Item 4</a></li>
                                        <li><a href="#">Mega Menu Item 5</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Headline 4</li>
                                        <li><a href="#">Mega Menu Item 1</a></li>
                                        <li><a href="#">Mega Menu Item 2</a></li>
                                        <li><a href="#">Mega Menu Item 3</a></li>
                                        <li><a href="#">Mega Menu Item 4</a></li>
                                        <li><a href="#">Mega Menu Item 5</a></li>
                                    </ul>
                                </div>
                            </li> --}}
                            <li><a href="contact.html">Liên hệ</a></li>
                            @if (\Illuminate\Support\Facades\Auth::user())
                                @if (\Illuminate\Support\Facades\Auth::user()->role == 1)
                                <li>
                                    <a href="{{ route('house.add', \Illuminate\Support\Facades\Auth::user()->id) }}">Đăng nhà cho thuê</a>
                                </li>
                                @endif
                            @endif

                            <li>
                                <a class="btn-login" @if (\Illuminate\Support\Facades\Auth::user()) @else
                                    href="{{ route('login.show') }}" @endif>
                                    @if (\Illuminate\Support\Facades\Auth::check())
                                    {{ \Illuminate\Support\Facades\Auth::user()->email }}
                                    @else
                                    Đăng nhập
                                    @endif
                                </a>
                                @if (\Illuminate\Support\Facades\Auth::user())
                                <ul class="dropdown">
                                    <li><a href="{{ route('login.logout') }}">Đăng xuất</a></li>
                                    <li>
                                        <a href="{{ route('profile.show', \Illuminate\Support\Facades\Auth::user()->id) }}">Thông tin của bạn</a>
                                    </li>

                                    @if (\Illuminate\Support\Facades\Auth::user()->role == 1)
                                        <li>
                                            <a href="{{ route('user.showCustomerHouse', \Illuminate\Support\Facades\Auth::user()->id ) }}">Xem khách thuê nhà</a>
                                        </li>
                                    @endif

                                    @if (\Illuminate\Support\Facades\Auth::user()->role == 2)
                                        <li>
                                            <a href="{{ route('user.showHouseList', \Illuminate\Support\Facades\Auth::user()->id) }}">Lịch sử thuê nhà</a>
                                        </li>
                                    @endif


                                    {{-- <li>
                                        <a href="{{ route('user.showListHouse', \Illuminate\Support\Facades\Auth::user()->id ) }}">Lịch sử đặt nhà</a>
                                    </li> --}}

                                </ul>
                                @endif
                            </li>
                            <li>
                                @if (\Illuminate\Support\Facades\Auth::check())

                                @else
                                <a class="btn-register" href="{{ route('register') }}">Đăng kí
                                </a>
                                @endif

                            </li>
                        </ul>

                        <!-- Search Form -->
                        <div class="south-search-form">
                            <form action="#" method="post">
                                <input type="search" name="search" id="search" placeholder="Search Anything ...">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- Search Button -->
                        <a href="#" class="searchbtn"><i class="fa" aria-hidden="true"></i></a>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
