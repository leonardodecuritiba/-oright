@extends('guest.layouts.app')

@section('title', 'Home')

@section('page_header')

    @include('guest.layouts.inc.header')

@endsection


@section('style_content')

    <style>
        section.mini-feature__style-2 p {
            font-size: 12px !important;
        }
        @media(min-width: 767px) and (max-width: 1024px)   {
            section.mini-feature__style-2 p {
                font-size: 11.7px !important;
            }
        }

        ul.pricing-feature li span {
            font-size:  12px;
        }

    </style>

@endsection

@section('page_content')

    <!-- Main Content
    ========================================-->

    <main class="entry-main">

        <!-- Mini Feature Section
        ========================================-->
        <section class="mini-feature__style-2 section-without-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="mini-feature-box">
                            <div class="icon-box">
                                <img alt="" src="{{asset('assets/images/icons-features/blockchain-icon.png')}}">
                                <img alt="" src="{{asset('assets/images/icons-features/blockchain-icon.png')}}">
                            </div>
                            <div class="data-box">
                                <h3>Blockchain</h3>
                                <p>
                                    Utilizamos Blockchain, uma tecnologia inovadora que aplicamos para criptografar e registrar os copyrights do seu projeto ou criação.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                        <div class="mini-feature-box">
                            <div class="icon-box">
                                <img alt="" src="{{asset('assets/images/icons-features/transparente-icon.png')}}">
                                <img alt="" src="{{asset('assets/images/icons-features/transparente-icon.png')}}">
                            </div>
                            <div class="data-box">
                                <h3>Transparente</h3>
                                <p>
                                    Ao receber o código e o copyright do seu projeto, seu cliente aceita que os proprietários da idéia ou projeto, são você ou sua empresa.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="mini-feature-box">
                            <div class="icon-box">
                                <img alt="" src="{{asset('assets/images/icons-features/amigavel-icon.png')}}">
                                <img alt="" src="{{asset('assets/images/icons-features/amigavel-icon.png')}}">
                            </div>
                            <div class="data-box">
                                <h3>Amigável</h3>
                                <p>
                                    Deixe a parte chata com a gente. De maneira amigável, informamos o seu cliente sobre os copyrights do seu projeto ou criação.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="mini-feature-box">
                            <div class="icon-box">
                                <img alt="" src="{{asset('assets/images/icons-features/04.png')}}">
                                <img alt="" src="{{asset('assets/images/icons-features/04.png')}}">
                            </div>
                            <div class="data-box">
                                <h3>Hiper Seguro</h3>
                                <p>
                                    Seus projetos e criações são registradas em uma enorme rede de computadores. Seus direitos autorais estão protegidos contra plágios.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                        <div class="mini-feature-box">
                            <div class="icon-box">
                                <img alt="" src="{{asset('assets/images/icons-features/05.png')}}">
                                <img alt="" src="{{asset('assets/images/icons-features/05.png')}}">
                            </div>
                            <div class="data-box">
                                <h3>Democrático</h3>
                                <p>
                                    Campanhas publicitárias, projetos de arquitetura, apresentações comerciais a protótipos de sites. Todos podem registrar seus projetos.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="mini-feature-box">
                            <div class="icon-box">
                                <img alt="" src="{{asset('assets/images/icons-features/06.png')}}">
                                <img alt="" src="{{asset('assets/images/icons-features/06.png')}}">
                            </div>
                            <div class="data-box">
                                <h3>Fácil de Usar</h3>
                                <p>
                                    Crie sua conta, suba seu projeto, registre-o e envie o código para seu cliente. Pronto, agora é só acompanhar tudo no painel de controle.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section
        ========================================-->
        <section class="features" id="features">
            <div class="container">
                <div class="section-title style-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <h2>
                        Características
                    </h2>
                    <span><span></span></span>
                </div>
                <div class="appInfo-container">
                    <div class="row appInfo-row">
                        <div class="col-md-6 col-md-offset-1 col-sm-7">
                            <div class="appInfo-data wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <h2>Propriedade Intelectual</h2>
                                <p>
                                    Registre seus projetos e criações, proteja-os de reproduções não autorizadas. Plágio
                                    nunca mais!
                                </p>
                                <a href="{{ route('register') }}" class="appsLand-btn appsLand-btn-gradient"><span>Cadastrar</span></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5 hidden-xs">
                            <div class="img-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img alt="" src="{{asset('assets/images/imgs-features/propriedade-intelectual.png')}}"
                                     class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="row appInfo-row">
                        <div class="col-md-4 col-md-offset-1 col-sm-5 hidden-xs">
                            <div class="img-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                                <img alt="" src="{{asset('assets/images/imgs-features/transparencia-total.jpg')}}"
                                     class="img-responsive">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-7">
                            <div class="appInfo-data wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <h2>Transparência Total</h2>
                                <p>
                                    Enviamos o registro do seu projeto automaticamente ao seu cliente.
                                    Ao aceitar os termos de uso ele está ciente do copyright do seu projeto e criação.
                                    Nós cuidamos disso para você, sem “climão” e com alta transparência.
                                </p>
                                <a href="{{ route('register') }}" class="appsLand-btn appsLand-btn-gradient"><span>Cadastrar</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Download Section
        ========================================-->
        <section class="download section-bg-img" id="download">
            <div class="app-overlay">
                <div class="container">
                    <div class="section-title style-gradient white-color wow fadeInUp" data-wow-duration="1s"
                         data-wow-delay="0s">
                        <h2>
                            copyrights protegidos
                        </h2>
                        <span><span></span></span>
                    </div>
                    {{--<div class="download-buttons">--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-sm-4">--}}
                    {{--<div class="wow fadeInUp first-download-btn" data-wow-duration="1s" data-wow-delay="0.25s">--}}
                    {{--<a href="#" class="appsLand-btn appsLand-btn-gradient appsLand-btn-larg"><span><i class="fa fa-windows"></i> Windows Store</span></a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-4">--}}
                    {{--<div class="wow fadeInUp second-download-btn" data-wow-duration="1s" data-wow-delay="0.5s">--}}
                    {{--<a href="#" class="appsLand-btn appsLand-btn-gradient appsLand-btn-larg"><span><i class="fa fa-android"></i> Google Store</span></a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-4">--}}
                    {{--<div class="wow fadeInUp third-download-btn" data-wow-duration="1s" data-wow-delay="0.75s">--}}
                    {{--<a href="#" class="appsLand-btn appsLand-btn-gradient appsLand-btn-larg"><span><i class="fa fa-apple"></i> Apple Store</span></a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </section>

        <!-- FAQ Section
        ========================================-->
        <section class="faq">
            <div class="container">
                <div class="section-title style-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <h2>
                        FAQ
                    </h2>
                    <span><span></span></span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel-group questions-container" id="accordion" role="tablist"
                             aria-multiselectable="true">
                            <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="gradient-bg" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                           aria-controls="collapseOne">
                                            <span>Quais tipos de registro de propriedade posso fazer?</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <p>
                                        <ul>
                                            @foreach(\App\Models\Works\Category::getAllToHome() as $item)
                                                <li>
                                                    {{$item}}
                                                </li>
                                            @endforeach
                                        </ul>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed gradient-bg" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                           aria-controls="collapseTwo">
                                            <span>Quem pode usar o registro de propriedade?</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <p>
                                        <ul>
                                            <li>indústrias que inovam produtos</li>
                                            <li>agências de publicidade</li>
                                            <li>agências de design</li>
                                            <li>escritórios de arquitetura</li>
                                            <li>fotógrafos</li>
                                            <li>artistas plásticos</li>
                                            <li>agências de eventos</li>
                                            <li>profissionais criativos</li>
                                            <li>acadêmicos, estudantes e todos que trabalham duro para criar algo inovador.</li>
                                        </ul>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-md-6 hidden-sm hidden-xs">
                        <img alt="" src="{{asset('assets/images/backgrounds/faq.jpg')}}" class="img-responsive wow fadeInUp"
                             data-wow-duration="1s" data-wow-delay="1s">
                    </div>
                </div>
            </div>
        </section>

        @if(0)
            <!-- Testimonials Section
            ========================================-->
            <section class="testimonials" id="testimonials">
                <div class="app-overlay">
                    <div class="container">
                        <div class="section-title style-gradient white-color wow fadeInUp" data-wow-duration="1s"
                             data-wow-delay="0s">
                            <h2>
                                Cases
                            </h2>
                            <span><span></span></span>
                        </div>
                        <div class="testimonials-template">
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="testimonials-slider-container wow fadeInUp" data-wow-duration="1s"
                                         data-wow-delay="0.25s">
                                        <div class="swiper-wrapper">

                                            @foreach($Page->auxiliar['cases'] as $case)
                                                <div class="swiper-slide testimonials-slide">
                                                    <div class="row table-row">
                                                        <div class="col-lg-3 col-left table-cel">
                                                            <div class="client-info text-center">
                                                                <div class="client-pic">
                                                                    <img alt="{{$case['name']}}" src="{{$case['image']}}"
                                                                         class="center-block">
                                                                </div>
                                                                <h4 class="client-name">{{$case['name']}}</h4>
                                                                <p class="client-career">{{$case['function']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9 col-right table-cel">
                                                            <div class="client-review">
                                                                <p>
                                                                    {{$case['content']}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                        <!-- Add Arrows -->
                                        <div class="testimonials-slider-button-prev swiper-button-prev"></div>
                                        <div class="testimonials-slider-button-next swiper-button-next"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- Pricing Section
        ========================================-->
        <section class="pricing" id="pricing">
            <div class="container">
                <div class="section-title style-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <h2>
                        Preços
                    </h2>
                    <span><span></span></span>
                </div>
                <div class="pricing-tables">
                    <div class="row">

                        @foreach($Page->auxiliar['plans'] as $plan)
                            <div class="col-md-4 col-sm-6">
                                <div class="pricing-table wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                    <div class="pricing-header">
                                        <h2>{{$plan['name']}}</h2>
                                    </div>
                                    <div class="pricing-price">
                                        <p><span class="sup">R$</span> <span class="price">{{$plan['value']}}</span> <span
                                                    class="sub">/Mês</span>
                                        </p>
                                    </div>
                                    <ul class="pricing-feature list-unstyled">
                                        <li><span>Registros de Propriedade</span><span>{{$plan['registers']}}</span></li>
                                        @foreach($Page->auxiliar['descriptions'] as $i => $description)
                                            <li><span>{{$description}}</span>
                                                @if($plan['options'][$i])
                                                    <span class="main-color-text"><i class="fa fa-check"></i></span>
                                                @else
                                                    <span class="sec-color-text"><i class="fa fa-remove"></i></span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="pricing-btn">
                                        @if( $plan['free'] )
                                            <a href="{{ route('register.plan', $plan['id']) }}"
                                               class="appsLand-btn appsLand-btn-gradient"><span>Avaliar por {{$plan['free_days']}} Dias</span></a>
                                        @else
                                            <a href="{{ route('register.plan', $plan['id']) }}"
                                               class="appsLand-btn appsLand-btn-gradient btn-inverse"><span>Escolher</span></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Section
        ========================================-->
        <section class="blog" id="blog">
            <div class="container">
                <div class="section-title style-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <h2>
                        News
                    </h2>
                    <span><span></span></span>
                </div>
                <div class="posts">
                    <div class="row">
                        @foreach($Page->auxiliar['posts'] as $post)
                            @include('guest.blogs.inc.singlepost')
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section
        ========================================-->
        <section class="contact contact__style-2 section-bg-img" id="contact">
            <div class="app-overlay">
                <div class="container">
                    <div class="section-title style-gradient white-color wow fadeInUp" data-wow-duration="1s"
                         data-wow-delay="0s">
                        <h2>
                            Contato
                        </h2>
                        <span><span></span></span>
                    </div>
                    <div class="contact-form wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                        <div class="row">
                            <div class="col-md-4 col-lg-push-8 col-md-push-8">
                                <div class="contact-info">
                                    <div class="info-box">
                                        <div class="icon-box">
                                            <i class="fa fa-envelope-o white-color"></i>
                                        </div>
                                        <h5>E-mail</h5>
                                        <p>
                                            <a style="color: #FFF;" href="maito:{{config('mail.username')}}">{{config('mail.username')}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-pull-4 col-md-pull-4">
                                {{Form::open(['route'=>'index.sendemail', 'method' =>'POST'])}}
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control" placeholder="Nome Completo" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" placeholder="E-mail (uso frequente)" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" placeholder="Sua Mensagem" required></textarea>
                                    </div>
                                    <div class="btn-box">
                                        <button type="submit" class="appsLand-btn appsLand-btn-gradient btn-inverse">
                                            <span><i class="fa fa-send"></i> Enviar</span></button>
                                    </div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if(0)
            <!-- Client Logo Section
            ========================================-->
            <div class="clients-logo">
                <div class="container">
                    <div class="clientLogos-slider-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="#">
                                    <img alt="" src="http://placehold.it/100x32" class="img-responsive">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <img alt="" src="http://placehold.it/100x32" class="img-responsive">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <img alt="" src="http://placehold.it/100x32" class="img-responsive">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <img alt="" src="http://placehold.it/100x32" class="img-responsive">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <img alt="" src="http://placehold.it/100x32" class="img-responsive">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <img alt="" src="http://placehold.it/100x32" class="img-responsive">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <img alt="" src="http://placehold.it/100x32" class="img-responsive">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <img alt="" src="http://placehold.it/100x32" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Subscribe Section
        ========================================-->
        <section class="subscribe">
            <div class="container">
                <div class="section-title style-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <h2>
                        Newsletter
                    </h2>
                    <span><span></span></span>
                </div>
                {{Form::open(['route'=>'index.sendnewsletter', 'method' =>'POST'])}}
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                            <div class="custom-input-group wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <input name="email" type="email" class="form-control" placeholder="Email">
                                <button type="submit" class="appsLand-btn appsLand-btn-gradient subscribe-btn"><span>Inscrever</span>
                                </button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                {{Form::close()}}
            </div>
        </section>
    </main>


@endsection


@section('script_content')


@endsection