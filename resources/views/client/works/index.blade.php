@extends('commons.layouts.app')

@section('title', $Page->page_title)

@section('page_content')
    <!-- Main container -->

    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>{{$Page->main_title}}</strong>
                <small>
                    Saldo Disponível: <b>{{trans_choice('pages.data.registers', $Page->auxiliar['registers'], ['value' => $Page->auxiliar['registers']])}}</b>
                </small>
            </h1>
            <button onclick="window.location.href='{{route($Page->entity.'.create')}}'" class="btn btn-outline btn-purple">
                {{trans('pages.view.CREATE', [ 'name' => $Page->name ])}}
            </button>
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
            <h4 class="card-title"><strong>{{count($Page->response)}}</strong> Registros</h4>

            <div class="card-body">

                <table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cadastrado</th>
                        <th>Blockchain</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Cadastrado</th>
                        <th>Blockchain</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($Page->response as $sel)
                        <tr>
                            <td>{{$sel['id']}}</td>
                            <td data-order="{{$sel['created_at_time']}}">{{$sel['created_at']}}</td>
                            <td>{{$sel['blockchain_text']}}</td>
                            <td>{{$sel['title']}}</td>
                            <td>{{$sel['descriptions']}}</td>
                            <td>{{$sel['category']}}</td>
                            <td>
                                @include('commons.layouts.inc.buttons.edit')
{{--                                @include('commons.layouts.inc.buttons.delete')--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @include('commons.layouts.inc.loading')
        </div>


    </div><!--/.main-content -->
@endsection

@section('script_content')
    <!-- Sample data to populate jsGrid demo tables -->
    @include('commons.layouts.inc.datatable.js')

    @include('commons.layouts.inc.sweetalert.js')
@endsection