@extends('commons.layouts.app')

@section('title', $Page->page_title)

@section('style_content')
    <!-- Bootstrap Select Css -->
    {{Html::style('bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}
@endsection

@section('page_modals')
    @if(!$Data->hasBlockchain())
        @include('commons.layouts.inc.modal.works.attaches',['route'=> 'client_work_files.store'])
        @include('commons.layouts.inc.modal.works.coparticipation',['route'=>'client_coparcenaries.store'])
    @endif
    @include('commons.layouts.inc.modal.works.generate-blockchain')
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
            {{Form::model($Data,
                array(
                    'route'         => ['client_works.update',$Data->id],
                    'method'        => 'PATCH',
                    'files'         => true,
                    'id'            => 'form-work',
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

    <!-- Sample data to populate jsGrid demo tables -->
    @include('commons.layouts.inc.datatable.js')

    @include('commons.layouts.inc.sweetalert.js')

    <script>
        function ValidateEmail(mail)
        {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
            {
                console.log("Valido!");
                return (true)
            }
            console.log("You have entered an invalid email address!");
            return (false)
        }

        $(document).ready(function()
        {
            $('div#coparticipationModal input[name=email]').on('keyup focusout',function(e){
                var $form = $(this).parents('form');
                var $form_name = $(this).parents('form').find('input[name=name]');
                var $form_user_id = $(this).parents('form').find('input[name=user_id]');
                if(ValidateEmail($(this).val())){
                    var $el = $(this);
                    $.ajax({
                        url: "{{route('ajax.get.coparcenary')}}",
                        type: 'post',
                        data: {
                            "work_id": $($form).find('input[name=work_id]').val(),
                            "email": $(this).val(),
                            "_token": "{{ csrf_token() }}"},
                        // dataType: "json",

                        beforeSend: function () {
                            loadingCard('show',$el);
                        },
                        error: function (xhr, textStatus) {
                            loadingCard('hide', $el);
                            console.log('xhr-error: ' + xhr);
                            console.log('textStatus-error: ' + textStatus);
                        },
                        /**/
                        success: function (json) {
                            loadingCard('hide', $el);
                            console.log(json);
                            if(json.message != null){
                                $($form_user_id).val(json.message.user_id)
                                $($form_name).val(json.message.name)
                                $($form_name).attr('disabled',true);
                            } else {
                                $($form_user_id).val('')
                                $($form_name).val('')
                                $($form_name).attr('disabled',false);
                            }
                        }
                    });
                } else {
                    $($form_user_id).val('')
                    $($form_name).val('')
                    $($form_name).attr('disabled',false);
                }
            })
        })
    </script>

    <script>
        $(document).ready(function()
        {
            $('button.btn-submit').on('click',function(e){
                var $form = $('form#form-work');
                $($form).find('input[name=generate]').val(1);
                $($form).submit();
            });
        })

    </script>
@endsection