<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/front-asset/img/fav.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>
    <!--
  CSS
  ============================================= -->
    <link rel="stylesheet" href="{{ asset('assets/front-asset/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-asset/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-asset/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-asset/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-asset/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-asset/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-asset/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-asset/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/front-asset/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/front-asset/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-asset/css/main.css') }}">
</head>

<style>
    .img-fluid {
        max-width: 100%;
        /* Maksimum lebar gambar adalah lebar elemen induk */
        max-height: 100%;
        /* Maksimum tinggi gambar adalah tinggi elemen induk */
        height: auto;
    }

    .round {
        border-radius: 50px;
    }

    .logo_h {
        font-weight: 900;
        font-size: 34px;
        padding: 30px 0 30px 0;
        text-shadow: 3px 3px #ebeae1;
    }
</style>

<body>

    @php
        $route = Illuminate\Support\Facades\Route::currentRouteName();
    @endphp
    @include('sweetalert::alert')

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h text-warning" href="{{ route('front.product') }}">MAD MART</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item {{ $route == 'front.product' ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('front.product') }}">Home</a></li>
                            @if (auth()->user() == null)
                                <li class="nav-item {{ $route == 'front.login' ? 'active' : '' }}"><a class="nav-link" href="{{ route('front.login') }}">Login</a>
                                </li>
                            @else
                                <li class="nav-item "><a class="nav-link" href="{{ route('front.cart', auth()->user()->id) }}">Cart</a></li>
                                <li class="nav-item {{ $route == 'front.user.edit' ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('front.user.edit', auth()->user()->id) }}">
                                        {{ auth()->user()->name }} <img class="round ml-1"
                                            src="{{ '/storage/images/' . Auth::user()->image }}" alt="avatar"
                                            height="20" width="20"></a>
                                </li>
                                <li class="nav-item active"><a class="nav-link ml-5" href="{{ route('front.logout') }}"
                                        title="Logout"><i style="font-size: 18px;" class="fa fa-sign-out fa-2"> </i>
                                    </a></li>
                            @endif
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            {{-- <li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        {{-- <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div> --}}
    </header>
    <!-- End Header Area -->

    <!-- start product Area -->
    <section class="owl-carousel active-product-area section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </section>
    <!-- end product Area -->

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> Ahmad Mart <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
                        href="https://mad-portfolio.netlify.app/" target="_blank">mad</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="{{ asset('front-asset/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/front-asset/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front-asset/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/front-asset/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/front-asset/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/front-asset/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/front-asset/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/front-asset/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/front-asset/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
