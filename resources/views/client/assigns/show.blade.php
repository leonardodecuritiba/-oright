@extends('commons.layouts.app')

@section('title', $Page->page_title)

{{--@section('route', route('cliente'))--}}

@section('page_content')
    <!-- Main container -->

    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>{{$Page->main_title}}</strong>
            </h1>
        </div>
    </header><!--/.header -->


    <div class="main-content">


    @include('commons.layouts.inc.alerts')

    <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Zero configuration
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->

        <div class="card">

            <div class="card-body">
                <h6 class="text-uppercase mt-3">Dados da Assinatura (<i>#{{$Data['code']}}</i>)</h6>

                <div class="form-row">
                    <label class="col-sm-2 col-form-label">Data de Criação</label>
                    <div class="col-sm-6">
                        <p class="form-control-plaintext">{{$Data['creation_date']}}</p>
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-sm-2 col-form-label">Situação</label>
                    <div class="col-sm-6">
                        <p class="form-control-plaintext">{{$Data['status']}}</p>
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-sm-2 col-form-label">Plano</label>
                    <div class="col-sm-6">
                        <p class="form-control-plaintext">{{$Data['plan']}}</p>
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-sm-2 col-form-label">Método de Pagamento</label>
                    <div class="col-sm-6">
                        <p class="form-control-plaintext">{{$Data['payment_method']}}</p>
                    </div>
                </div>

                {{--<div class="form-row">--}}
                {{--<label class="col-sm-2 col-form-label">Descrição</label>--}}
                {{--<div class="col-sm-6">--}}
                {{--<p class="form-control-plaintext">{{$Data->description}}</p>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-row">--}}
                {{--<label class="col-sm-2 col-form-label">Valor</label>--}}
                {{--<div class="col-sm-10">--}}
                {{--<p class="form-control-plaintext">{{$Data->amount}}</p>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-row">--}}
                {{--<label class="col-sm-2 col-form-label">Número de Registros</label>--}}
                {{--<div class="col-sm-10">--}}
                {{--<p class="form-control-plaintext">{{$Data->registers}}</p>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-row">--}}
                {{--<label class="col-sm-2 col-form-label">Duração</label>--}}
                {{--<div class="col-sm-10">--}}
                {{--<p class="form-control-plaintext">{{$Data->getIntervalText()}}</p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-row">--}}
                {{--<label class="col-sm-2 col-form-label">Período de Teste</label>--}}
                {{--<div class="col-sm-10">--}}
                {{--<p class="form-control-plaintext">{{$Data->getTrialText()}}</p>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<hr>--}}

                {{--@include('commons.form.clients.billing')--}}
            </div>


        </div><!--/.main-content -->
@endsection


@section('script_content')
@endsection