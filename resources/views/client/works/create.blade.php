@extends('commons.layouts.app')

@section('title', $Page->page_title)

@section('style_content')
    <!-- Bootstrap Select Css -->
    {{Html::style('bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}
@endsection

@section('page_content')


    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>{{$Page->main_title}}</strong>
                <small>
                    Saldo Disponível: <b>{{trans_choice('pages.data.registers', $Page->auxiliar['registers'], ['value' => $Page->auxiliar['registers']])}}</b>
                </small>
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
            {{Form::open(
                array(
                        'route'         => 'client_works.store',
                        'method'        => 'POST',
                        'files'         => true,
                        'data-provide'  => "validation",
                        'data-disable'  =>'false'
                    )
                )}}
            @include('commons.form.works.data')
            {{Form::close()}}
        </div>
    </div>

@endsection

@section('script_content')

    {{--<!-- Jquery Validation Plugin Js -->--}}
    @include('commons.layouts.inc.validation.js')

    {{--<!-- Jquery InputMask Js -->--}}
    @include('commons.layouts.inc.inputmask.js')

@endsection