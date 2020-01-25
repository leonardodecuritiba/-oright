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
                        <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">Obrigado!</h1>
                        <h4>
                            Veja detalhes do projeto resumido que foi compartilhado com você.
                        </h4>
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
                    <div class="col-md-12">
                        <div class="posts">
                            <p>Criador: {{$Data->work->getShortOwnerName()}}</p>
                            <p>Título: {{$Data->work->title}}</p>
                            <p>Categoria: {{$Data->work->getCategoryTitle()}}</p>
                            <p>Descrição: {{$Data->work->descriptions}}</p>
                            {{--<p>Anexos: {{$Data->work->work_files}}</p>--}}
                            {{--<p>Coparticipações: {{$Data->work->coparticionaries}}</p>--}}
                        </div>
                        @if(!$Data->isConfirmated())
                            <div class="posts">
                                <a class="btn btn-info" href="{{route('works.confirm_coparcenay',[$Data->id,$Data->token] )}}">Confirmar e Ver</a>
                            </div>
                        @else
                            <div class="posts">
                                <a class="btn btn-info" href="{{$Data->work->getGenerateHtmlLink()}}">Abrir Documento</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </main>


@endsection


@section('script_content')


@endsection