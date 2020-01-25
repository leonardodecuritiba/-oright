<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--<meta name="description" content="Responsive admin dashboard and web application ui kit. A highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.">--}}
    {{--<meta name="keywords" content="datatables">--}}

    <title>{{ config('app.name', 'Oright - Admin') }} - @yield('title')</title>

    @include('commons.layouts.inc.head')
</head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <div class="spinner-dots">
            <span class="dot1"></span>
            <span class="dot2"></span>
            <span class="dot3"></span>
        </div>
    </div>

    @role('admin')
        @include('admin.inc.sidebar')
        @include('admin.inc.topbar')
    @endrole

    @role('client')
        @include('client.inc.sidebar')
        @include('client.inc.topbar')
    @endrole

    <main class="main-container">

        @include('commons.layouts.inc.modal.change-password')

        @yield('page_modals')

        @yield('page_content')

        @include('commons.layouts.inc.footer')

    </main>

    <!-- Global quickview -->
    <div id="qv-global" class="quickview" data-url="../assets/data/quickview-global.html">
        <div class="spinner-linear">
            <div class="line"></div>
        </div>
    </div>
    <!-- END Global quickview -->

    @include('commons.layouts.inc.foot')

</body>
</html>
