@extends('commons.layouts.extras.app')
@section('body_content')

    <div class="row no-margin h-fullscreen" style="padding-top: 10%">

        <div class="col-12">
            <div class="card card-transparent mx-auto text-center">
                <h1 class="text-secondary lh-1" style="font-size: 200px">403</h1>
                <hr class="w-30px">
                <h3 class="text-uppercase">Acesso não autorizado!</h3>

                <p class="lead">Acesso não autorizado ou recurso não encontrado</.</p>

                <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center fs-14">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reportar um problema</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index')}}">Voltar</a>
                    </li>
                </ul>
            </div>
        </div>


        <footer class="col-12 align-self-end text-center fs-13">
            <p>Copyright © 2017 <a href="{{route('index')}}">{{ config('app.name', 'Oright') }}</a>. All rights
                reserved.</p>
        </footer>
    </div>
@endsection
