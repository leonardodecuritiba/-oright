<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Orights') }} - @yield('title')</title>

    @include('guest.layouts.inc.head')
</head>

<body data-spy="scroll" data-target="#bs-example-navbar-collapse-1" data-offset="5" class="scrollspy-example">


<!-- navbar
========================================-->
@include('guest.layouts.inc.navbar')

<!-- Header
        ========================================-->
@yield('page_header')

<!-- Main Content
        ========================================-->
@yield('page_content')

<!-- Scroll To Top
========================================-->
<div class="scrollToTop appsLand-btn appsLand-btn-gradient"><span><i class="fa fa-angle-up"></i></span></div>

<!-- Loading
========================================-->
<div class="loading">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>

<!-- Footer
========================================-->
<footer class="apps-footer">
    <div class="footer-top">
        <div class="container">
            <div class="apps-short-info">
                <a href="{{route('index')}}">
                    <img alt="" width="50" src="{{asset('assets/images/logos/logo-w-p.png')}}">
                </a>
            </div>
            <ul class="list-inline list-unstyled footer-social-links">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>Todos os direitos reservados © {{date('Y')}} <a href="{{route('index')}}">Orights</a></p>
        </div>
    </div>
</footer>


@include('guest.layouts.inc.foot')

</body>
</html>
