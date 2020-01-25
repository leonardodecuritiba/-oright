@extends('guest.layouts.app')

@section('title', 'Home')

@section('style_content')
    <style>
        .inner-header {
            background: url("{{asset('assets/images/backgrounds/blog.jpg')}}") bottom center no-repeat fixed;
        }

    </style>
@endsection
@section('page_header')

    <header class="active-navbar inner-header" id="home">
        <div class="app-overlay">
            <div class="header-content">
                <div class="container">
                    <div class="site-intro-content">
                        <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">Orights Blog</h1>
                        <ul class="list-inline list-unstyled header-links wow fadeInUp" data-wow-duration="1s"
                            data-wow-delay="0.25s">
                            <li>
                                <a href="{{route('index')}}">
                                    Home
                                </a>
                            </li>
                            <li>
                            <span>
                                Blog
                            </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

@endsection

@section('page_content')

    <!-- Main Content
    ========================================-->

    <main class="entry-main">

        <!-- Blog Section
        ========================================-->
        <div class="blog section-without-title" id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <form class="search-form visible-sm-block visible-xs-block">
                            <div class="form-group">
                                <div class="search-input-group">
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <button class="appsLand-btn appsLand-btn-gradient search-btn"><span><i
                                                    class="fa fa-search"></i></span></button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                        <div class="posts">
                            <div class="row">
                                @foreach($Page->response as $post)
                                    @include('guest.blogs.inc.singlepost')
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        @include('guest.blogs.inc.sidebar')
                    </div>
                </div>
            </div>
        </div>

    </main>


@endsection


@section('script_content')


@endsection