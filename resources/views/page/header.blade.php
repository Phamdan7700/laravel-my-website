<!doctype html>
<html class="no-js" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>News 24H</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="manifest" href="assets/img/site.webmanifest">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('page/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('page/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('page/assets/css/ticker-style.css') }}">
    <link rel="stylesheet" href="{{ asset('page/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('page/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('page/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('page/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('page/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('page/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('page/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('page/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('page/assets/css/style.css') }}">
</head>

<body>

    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9 pl-5">
                                <a class="weatherwidget-io" href="https://forecast7.com/en/16d45107d56/hue/"
                                    data-label_1="HUE" data-label_2="Thời Tiết" data-theme="pure">HUE Thời Tiết</a>
                                <script>
                                    ! function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (!d.getElementById(id)) {
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = 'https://weatherwidget.io/js/widget.min.js';
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }
                                    }(document, 'script', 'weatherwidget-io-js');

                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky gray-bg">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                                            <!-- ============================THE LOAI======================= -->
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a href="#">{{$category->name}}
                                                    </a>
                                                    <ul class="submenu">
                                                        @foreach ($category->typeNews as $type)
                                                            <li>
                                                                <a href="{{ route('type.show', $type->id) }}"> {{$type->name}}
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                    </ul>

                                                </li>
                                            @endforeach
                                            <!-- ============================php======================= -->


                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <i class="fas fa-search special-tag"></i>
                                    <div class="search-box">
                                        <form action="#">
                                            <input type="text" placeholder="Search">

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
    </header>
