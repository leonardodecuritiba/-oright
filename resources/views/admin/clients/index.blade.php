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
            <button onclick="window.location.href='{{route($Page->entity.'.create')}}'" class="btn btn-outline btn-purple">
                {{trans('pages.view.CREATE', [ 'name' => $Page->name ])}}
            </button>
        </div>
    </header><!--/.header -->


    <div class="main-content">


        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Zero configuration
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="card">
            <h4 class="card-title"><strong>{{count($Page->response)}}</strong> Registros</h4>

            <div class="card-content">
                <div class="card-body">

                    <table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Situação</th>
                            <th>Confirmação</th>
                            <th>Cadastrado</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>CPF/CNPJ</th>
                            <th>Assinatura</th>
                            <th>Trabalhos</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Situação</th>
                            <th>Confirmação</th>
                            <th>Cadastrado</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>CPF/CNPJ</th>
                            <th>Assinatura</th>
                            <th>Trabalhos</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($Page->response as $sel)
                            <tr class="{{(!$sel['active']['value']) ? 'bg-pale-danger':''}}">
                                <td>{{$sel['id']}}</td>
                                <td>
                                    <span class="badge badge-{{$sel['active']['active_color']}}">{{$sel['active']['active_text']}}</span>
                                </td>
                                <td>{{$sel['verified']}}</td>
                                <td data-order="{{$sel['created_at_time']}}">{{$sel['created_at']}}</td>
                                <td>{{$sel['name']}}</td>
                                <td>{{$sel['email']}}</td>
                                <td>{{$sel['document']}}</td>
                                <td>{{$sel['plan']}}</td>
                                <td>{{$sel['n_works']}}</td>
                                <td>
                                    @include('commons.layouts.inc.buttons.active',['active'=>$sel['active']])
                                    @include('commons.layouts.inc.buttons.edit')
                                    @include('commons.layouts.inc.buttons.delete')
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('commons.layouts.inc.loading')
        </div>


    </div><!--/.main-content -->
@endsection


@section('script_content')
    <!-- Sample data to populate jsGrid demo tables -->
    @include('commons.layouts.inc.active.js')

    @include('commons.layouts.inc.datatable.js')

    @include('commons.layouts.inc.sweetalert.js')

@endsection