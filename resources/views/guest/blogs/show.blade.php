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
                                <a href="{{route('blog.index')}}">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="{{$Data->category->getShortUrl()}}">
                                    {{$Data->category->title}}
                                </a>
                            </li>
                            <li>
                            <span>
                                {{$Data->title}}
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
                        <article class="single-post">
                            <figure class="entry-header wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                                <div class="entry-post-info">
                                    <h2>{{$Data->title}}</h2>
                                    <p class="posted-on">Posted On <strong>{{$Data->getPublishedAt('d F')}}</strong></p>
                                </div>
                                <div class="post-image">
                                    <img alt="" src="{{$Data->getShortImage()}}" class="img-responsive">
                                </div>
                                <ul class="entry-Categories list-unstyled list-inline">
                                    @foreach($Data->getTags() as $tag)
                                        <li><a href="{{$tag->url}}">{{$tag->title}}</a></li>
                                    @endforeach
                                </ul>
                            </figure>
                            <div class="entry-content">
                                {!! $Data->content !!}
                            </div>
                            <div class="entry-footer">
                                <div class="post-footer-data">
                                    @if(count($Data->getTags())>0)
                                        <ul class="entry-tags list-unstyled list-inline pull-left">
                                            <li><strong><i class="fa fa-tags"></i> TAGS:</strong></li>
                                            @foreach($Data->getTags() as $tag)
                                                <li><a href="{{$tag->url}}">{{$tag->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <ul class="list-unstyled list-inline pull-right comment-share">
                                        <li><strong><i class="fa fa-comments"></i> Comentários: {{$Data->getCommentsActiveCount()}}</strong></li>
                                        {{--<li>--}}
                                            {{--<ul class="list-unstyled list-inline share-links">--}}
                                                {{--<li><a href="#" data-toggle="tooltip" data-placement="top"--}}
                                                       {{--title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>--}}
                                                {{--<li><a href="#" data-toggle="tooltip" data-placement="top"--}}
                                                       {{--title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>--}}
                                                {{--<li><a href="#" data-toggle="tooltip" data-placement="top"--}}
                                                       {{--title="Share on Google+"><i class="fa fa-google-plus"></i></a></li>--}}
                                                {{--<li><a href="#" data-toggle="tooltip" data-placement="top"--}}
                                                       {{--title="Share on Email"><i class="fa fa-envelope-o"></i></a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    </ul>
                                </div>
                                <ul class="post-comments list-unstyled">
                                    @foreach($Data->getCommentsActive() as $comment)
                                        <li>
                                            <img alt="" src="{{$comment['author_image']}}" class="user-photo">
                                            <div class="the-comment">
                                                <div class="comment-box">
                                                    <div class="comment-header">
                                                        <h4>{{$comment['author_name']}}</h4>
                                                        <p>
                                                            {{$comment['created_at']->diffForHumans()}}
                                                        </p>
                                                        {{--<a href="#" class="comment-replay">--}}
                                                            {{--<i class="fa fa-reply"></i> Responder--}}
                                                        {{--</a>--}}
                                                    </div>
                                                    <p>
                                                        {{$comment['content']}}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                {{Form::open(array(
                                        'route' => ['client_comments.store'],
                                        'method'=>'POST',
                                        'class'=>'replay-form'
                                    )
                                    )}}
                                    <h3>Responder</h3>
                                    {{Form::hidden('post_id',$Data->id)}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<input type="text" class="form-control" placeholder="Name">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<input type="text" class="form-control" placeholder="Email">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <textarea name="content" maxlength="5000" class="form-control" placeholder="Comentário"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="appsLand-btn appsLand-btn-gradient"><span><i
                                                        class="fa fa-send"></i> Comentar</span></button>
                                    </div>
                                {{Form::close()}}
                            </div>
                        </article>
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