@extends('commons.layouts.app')

@section('title', $Page->page_title)

{{--@section('page_modals')--}}

    {{--@include('commons.layouts.inc.modal.plans.payment')--}}
{{--@endsection--}}
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
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Registros</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Registros</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($Page->response as $sel)
                        <tr>
                            <td>{{$sel['id']}}</td>
                            <td>{{$sel['type']}}</td>
                            <td>
                                @if($sel['url'] != NULL)
                                    <a href="{{$sel['url']}}">{{$sel['description']}}</a>
                                @else
                                    {{$sel['description']}}
                                @endif

                            </td>
                            <td data-order="{{$sel['value']}}">{{$sel['value_formatted']}}</td>
                            <td><strong class="text-{{$sel['color']}}">{{$sel['quantity']}}</strong></td>
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

    <script>
        app.ready(function () {
            $_TABLE_.order( [ 1, 'asc' ] )
                .draw();
        });
    </script>
@endsection