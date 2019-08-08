
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Belanja Online</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles') }}/bootstrap-4.1.2/bootstrap.min.css">
    <link href="{{ asset('frontend/plugins') }}/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins') }}/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins') }}/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins') }}/OwlCarousel2-2.2.1/animate.css">
    <link href="{{ asset('backend/assets') }}/css/components.css" rel="stylesheet" type="text/css">
    <style>
        .footer{
            position: relative;
        }
        .menu_nav ul li a:hover::after {
            width: 0 !important;
        }
    </style>
    @stack('css')
</head>
<body>

<!-- Menu -->

<div class="menu">

    <!-- Navigation -->
    <div class="menu_nav">
        <h3>Menu</h3>
        <ul>
            <li><a href="{{ url('/order') }}">Pesanan Saya</a></li>
        </ul>
    </div>
</div>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="header_overlay"></div>
        <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <div class="logo">
                <a href="{{ url('/produk') }}">
                    <div class="d-flex flex-row align-items-center justify-content-start">
                        <div><img src="{{ asset('frontend/images') }}/logo_1.png" alt=""></div>
                        <div>Belanja Online</div>
                    </div>
                </a>
            </div>
            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>

            <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
                <!-- Search -->
                <div class="header_search">
                    <form action="{{ url('produk') }}" method="get" id="header_search_form">
                        <input type="text" class="search_input" name="search" placeholder="Search Item" required="required" value="{{ @request()->search }}">
                        <button class="header_search_button"><img src="{{ asset('frontend/images') }}/search.png" alt=""></button>
                    </form>
                </div>
                <div class="user"><a href="{{ url('/cart') }}"><div><img class="svg" src="{{ asset('frontend/images') }}/cart.svg" alt="https://www.flaticon.com/authors/freepik">
                            @if(@auth()->user() && (auth()->user()->cart->count() > 0))
                                <div>{{ auth()->user()->cart->count() }}</div>
                            @endif
                        </div></a></div>
                @if(@auth()->user())
                    <a href="#" class="btnLogout mr-3">Logout</a>
                    <form action="{{ url('logout') }}" method="post" id="formLogout" class="d-none">
                        @csrf
                    </form>
                @else
                <div class="user"><a href="{{ url('/login') }}"><div><img src="{{ asset('frontend/images') }}/user.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
                @endif
            </div>
        </div>
    </header>

    <div class="super_container_inner">
        @yield('content')

        <!-- Footer -->

        <footer class="footer">
            <div class="footer_bar">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
                                <div class="copyright order-md-1 order-2"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>

<script src="{{ asset('frontend/js') }}/jquery-3.2.1.min.js"></script>
<script src="{{ asset('frontend/styles') }}/bootstrap-4.1.2/popper.js"></script>
<script src="{{ asset('frontend/styles') }}/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="{{ asset('frontend/plugins') }}/greensock/TweenMax.min.js"></script>
<script src="{{ asset('frontend/plugins') }}/greensock/TimelineMax.min.js"></script>
<script src="{{ asset('frontend/plugins') }}/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{ asset('frontend/plugins') }}/greensock/animation.gsap.min.js"></script>
<script src="{{ asset('frontend/plugins') }}/greensock/ScrollToPlugin.min.js"></script>
<script src="{{ asset('frontend/plugins') }}/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{ asset('frontend/plugins') }}/easing/easing.js"></script>
<script src="{{ asset('frontend/plugins') }}/progressbar/progressbar.min.js"></script>
<script src="{{ asset('frontend/plugins') }}/parallax-js-master/parallax.min.js"></script>
<script src="{{ asset('frontend/plugins') }}/Isotope/isotope.pkgd.min.js"></script>
<script src="{{ asset('frontend/plugins') }}/Isotope/fitcolumns.js"></script>
<script src="{{ asset('frontend/js') }}/category.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets') }}/js/plugins/notifications/sweet_alert.min.js"></script>
<script>
    $(document).ready(function(){
        $('.btnLogout').on('click', function(e){
            e.preventDefault();
            $('#formLogout').submit();
        });

        $('body').on('click', '.btnSubmit', function(e){
            e.preventDefault();

            var form = $(this).parents('form');
            form.submit();
        });

        $('body').on('click', '.btnDelete', function(e){
            e.preventDefault();

            var url = $(this).data('url');
            swal({
                    title: "Konfirmasi tindakan",
                    text: "Apakah anda yakin ingin menghapus data ini?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonColor: "#f33c37",
                    showLoaderOnConfirm: true
                },
                function() {
                    $('#formDelete').attr('action', url);
                    $('#formDelete').submit();
                });
        });
    });
</script>
@stack('js')
</body>
</html>
