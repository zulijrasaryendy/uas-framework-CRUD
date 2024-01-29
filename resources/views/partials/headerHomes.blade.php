<!-- Header Start -->
<div class="header-area">
    <div class="main-header ">
        <div class="header-top black-bg d-none d-md-block">
            <div class="container">
                <div class="col-xl-12">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="header-info-left">
                            <ul>
                                {{-- <li><img src="/assets/img/icon/header_icon1.png" alt="">34ºc, Sunny </li> --}}
                                <li><img src="/assets/img/icon/header_icon1.png"
                                        alt="">{{ Carbon\Carbon::now()->format('l, jS F, Y') }}</li>
                            </ul>
                        </div>
                        <div class="header-info-right">
                            <ul class="header-social">
                                {{-- <li><a href="#"><i class="fab fa-twitter"></i></a></li> --}}
                                <li><a href="https://www.instagram.com/dzulijra/"><i
                                            class="fab fa-instagram"></i></a></li>
                                {{-- <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li> --}}
                                <li> <a href="https://github.com/zulijrasaryendy"><i
                                            class="fab fa-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid d-none d-md-block">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="/"><img src="/assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9">
                        <div class="header-banner f-right ">
                            {{-- <img src="/assets/img/hero/header_card.jpg" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                        <!-- sticky -->
                        <div class="sticky-logo">
                            <a href="/"><img src="/assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-md-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="/">Home</a></li>
                                    {{-- <li><a href="/">Category</a></li> --}}
                                    <li><a href="/about">About</a></li>
                                    <li><a href="/blogs">Latest News</a></li>
                                    {{-- <li><a href="/">Contact</a></li> --}}
                                    @auth
                                        <li><a href="/dashboard">Dashboard</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    @endauth
                                    @guest
                                        <li><a href="/login">Login</a></li>
                                    @endguest
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <div class="header-right-btn f-right d-none d-lg-block">
                            <i class="fas fa-search special-tag"></i>
                            <div class="search-box">
                                <form action="/blogs">
                                    <input type="text" name="search" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-md-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->