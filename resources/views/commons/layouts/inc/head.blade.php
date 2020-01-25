<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

<!-- Bootstrap Core Css -->
{{Html::style('assets/css/core.min.css')}}

<!-- Waves Effect Css -->
{{Html::style('assets/css/app.min.css')}}

<!-- Animation Css -->
{{Html::style('assets/css/style.min.css')}}

<!-- Favicons -->
<link rel="apple-touch-icon" href="{{asset('assets/img/apple-touch-icon.png')}}">
<link rel="icon" href="{{asset('icon.png')}}">

<style>
    .sidebar-header {
        background-color: #24c6dc !important;
    }
</style>
<!--WaitMe Css-->
@yield('style_content')
