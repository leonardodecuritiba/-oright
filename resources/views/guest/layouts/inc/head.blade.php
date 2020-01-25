<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
<link rel="icon" href="{{asset('icon.png')}}">


<!-- Bootstrap Core Css -->
{{Html::style('hinata-theme/css/font-awesome.min.css')}}
{{Html::style('hinata-theme/css/bootstrap.min.css')}}
{{Html::style('hinata-theme/css/swiper.min.css')}}
{{Html::style('hinata-theme/css/animate.css')}}
{{Html::style('hinata-theme/css/lity.min.css')}}
@include('guest.layouts.inc.css.style-css')
@include('guest.layouts.inc.css.theme-css')

{{Html::style('hinata-theme/css/gradient_colors/theme_color_1.css',['id'=>"color-option"])}}

<!--[if lt IE 9]>
{{Html::script('hinata-theme/js/html5shiv.min.js')}}
{{Html::script('hinata-theme/js/respond.min.js')}}
<![endif]-->

<!--WaitMe Css-->
@yield('style_content')