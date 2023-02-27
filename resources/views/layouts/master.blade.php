<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Katen - Minimal Blog & Magazine HTML Theme</title>
    <meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('css/simple-line-icons.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
    @stack('css')
</head>

<body>

<!-- preloader -->
<div id="preloader">
    <div class="book">
        <div class="inner">
            <div class="left"></div>
            <div class="middle"></div>
            <div class="right"></div>
        </div>

    </div>
</div>

<!-- site wrapper -->
<div class="site-wrapper">

    <div class="main-overlay"></div>

    <!-- header -->
    <header class="header-default">
        <nav class="navbar navbar-expand-lg">
            <div class="container-xl">
                <!-- site logo -->
                <a class="navbar-brand" href="index.html"><img src="{{asset('images/logo.svg')}}" alt="logo"/></a>

                <div class="collapse navbar-collapse">
                    <!-- menus -->
                    @auth
                        @include('layouts._IsAdmin')
                    @else
                        @include('layouts._IsGuest')
                    @endauth
                </div>

                <!-- header right section -->
                <div class="header-right">
                    @auth
                        <div class="social-icons">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')"
                                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    @endauth
                    <!-- header buttons -->
                    <div class="header-buttons">
                        <button class="search icon-button">
                            <i class="icon-magnifier"></i>
                        </button>
                        <button class="burger-menu icon-button">
                            <span class="burger-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
    <!-- footer -->
    <footer>
        <div class="container-xl">
            <div class="footer-inner">
                <div class="row d-flex align-items-center gy-4">
                    <!-- copyright text -->
                    <div class="col-md-4">
                        <span class="copyright">© 2021 Katen. Template by ThemeGer.</span>
                    </div>

                    <!-- social icons -->
                    <div class="col-md-4 text-center">
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>

                    <!-- go to top button -->
                    <div class="col-md-4">
                        <a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div><!-- end site wrapper -->

<!-- search popup area -->
<div class="search-popup">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>
    <!-- content -->
    <div class="search-content">
        <div class="text-center">
            <h3 class="mb-4 mt-0">Tekan ESC untuk menutup</h3>
        </div>
        <!-- form -->
        <form class="d-flex search-form">
            <input class="form-control me-2" type="search" placeholder="Masukkan kata kunci pencarian ..."
                   aria-label="Search">
            <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
        </form>
    </div>
</div>

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>

    <!-- logo -->
    <div class="logo">
        <img src="{{asset('images/logo.svg')}}" alt="Katen"/>
    </div>

    <!-- menu -->
    <nav>
        <ul class="vertical-menu">
            <li>
                <a class="nav-link" href="category.html">Beranda</a>
            </li>
            <li>
                <a class="nav-link" href="category.html">Kegiatan</a>
            </li>
            <li>
                <a class="nav-link" href="category.html">Regulasi</a>
            </li>
            <li>
                <a href="#">Galeri</a>
                <ul class="submenu">
                    <li><a class="dropdown-item" href="category.html">Foto</a></li>
                    <li><a class="dropdown-item" href="blog-single.html">Video</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><strong>Admin</strong></a>
                <ul class="submenu">
                    <li><a class="dropdown-item" href="category.html">Category</a></li>
                    <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                    <li><a class="dropdown-item" href="blog-single-alt.html">Blog Single Alt</a></li>
                    <li><a class="dropdown-item" href="about.html">About</a></li>
                    <li><a class="dropdown-item" href="contact.html">Contact</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- social icons -->
    <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
    </ul>
</div>

<!-- JAVA SCRIPTS -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky-sidebar.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
@stack('js')
</body>
</html>
