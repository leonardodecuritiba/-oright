@extends('commons.layouts.app')

@section('title', $Page->page_title)

<?php //$MoipCreditCard = $client->getMoipCreditCard();?>

@section('page_modals')

    @include('commons.layouts.inc.modal.plans.payment')
@endsection

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

            @if(!$client->hasPlan())
                <button onclick="window.location.href='{{route($Page->entity.'.create')}}'" class="btn btn-outline btn-purple">
                    {{trans('pages.view.ASSIGN')}}
                </button>
            @endif
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
                        <th>Situação</th>
                        <th>Plano</th>
                        <th>Valor</th>
                        <th>Expira em</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Situação</th>
                        <th>Plano</th>
                        <th>Valor</th>
                        <th>Expira em</th>
                        <th>Ação</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($Page->response as $sel)
                        <tr class="bg-pale-{{$sel['status_color']}}">
                            <td>{{$sel['id']}}</td>
                            <td>
                                <span class="badge badge-{{$sel['status_color']}}">{{$sel['status_text']}}</span>
                            </td>
                            <td>{{$sel['name']}}</td>
                            <td data-order="{{$sel['value']}}">{{$sel['value_formatted']}}</td>
                            <td data-order="{{$sel['expiration_date_time']}}">{{$sel['expiration_date']}}</td>
                            <td>
                                {{--<a href="{{route('assigns.show',$sel['id'])}}"--}}
                                   {{--class="btn btn-simple btn-info btn-xs btn-icon edit"--}}
                                   {{--data-toggle="tooltip"--}}
                                   {{--data-placement="top"--}}
                                   {{--title="Editar"><i class="material-icons">remove_red_eye</i></a>--}}
                                @if($sel['pendent'])
                                    <button data-href="{{route($Page->entity.'.pay',$sel['id'])}}"
                                        data-attr='{{json_encode($sel)}}'
                                        data-toggle="modal"
                                        data-target="#paymentModal"
                                        class="btn btn-simple btn-xs btn-success btn-icon"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Pagar"><i
                                        class="material-icons">payment</i>
                                    </button>
                                @endif
                                @if($sel['can_cancel'])
                                    @include('commons.layouts.inc.buttons.cancel',['field_cancel_route' => route('assigns.cancel',$sel['id'])])
                                @endif
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

    {{--<!-- Jquery InputMask Js -->--}}
    @include('commons.layouts.inc.inputmask.js')

    <script>
        app.ready(function () {
            $_TABLE_.order( [ 1, 'asc' ] )
                .draw();
        });
    </script>


    <script>
        <!-- script deleção -->
        $(document).ready(function () {

            $('div#paymentModal').on('show.bs.modal', function (e) {
                var $origem = $(e.relatedTarget);
                var href_ = $($origem).data('href');
                $(this).find('form').attr('action',href_);
                var attr_ = $($origem).data('attr');
                var $body = $(this).find('.modal-body');
                console.log(attr_)
                $($body).find('section.payment').html(attr_.paypal_button);
                $($body).find('dd#situation').html(attr_.status_text);
                $($body).find('dd#plan').html(attr_.name);
                $($body).find('dd#value').html(attr_.value_formatted);
            });
        });
    </script>

    {{--CARTÃO DE CRÉDITO--}}

    <script>
        {{--@if($MoipCreditCard != NULL)--}}
            {{--var $_CREDIT_CARD_CURRENT_SECTION_ = 'section.credit-card-current';--}}
            {{--var $_CREDIT_CARD_NEW_SECTION_ = 'section.credit-card-new';--}}

            {{--function changeCreditCardOption(type){--}}

                {{--if(type == 'new'){--}}
                    {{--$($_CREDIT_CARD_NEW_SECTION_).show();--}}
                    {{--$($_CREDIT_CARD_NEW_SECTION_).find('input').attr('required', true);--}}

                    {{--$($_CREDIT_CARD_CURRENT_SECTION_).hide();--}}
                    {{--$($_CREDIT_CARD_CURRENT_SECTION_).parents('form').find('input[name=new_credit_card]').val(1);--}}

                {{--} else {--}}
                    {{--$($_CREDIT_CARD_NEW_SECTION_).hide();--}}
                    {{--$($_CREDIT_CARD_NEW_SECTION_).find('input').attr('required', false);--}}

                    {{--$($_CREDIT_CARD_CURRENT_SECTION_).show();--}}
                    {{--$($_CREDIT_CARD_CURRENT_SECTION_).parents('form').find('input[name=new_credit_card]').val(0);--}}

                {{--}--}}

            {{--}--}}

            {{--<!-- script cartão de crédito -->--}}
            {{--$(document).ready(function () {--}}
                {{--changeCreditCardOption('current');--}}

                {{--$('input[name=credit-card-option]').change(function () {--}}
                    {{--changeCreditCardOption($(this).val());--}}
                {{--});--}}

            {{--});--}}

        {{--@endif--}}
    </script>
@endsection