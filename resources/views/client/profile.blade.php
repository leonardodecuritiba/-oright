@extends('commons.layouts.app')

@section('title', $Page->page_title)

@section('style_content')
    <!-- Bootstrap Select Css -->
    {{Html::style('bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}
@endsection

@section('page_modals')
    @include('commons.layouts.inc.modal.remove-account')
@endsection

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
            {{Form::model($Data,
                    array(
                        'route' => 'profile.update',
                        'method'=>'PATCH',
                        'data-provide' => 'validation',
                        'class'=>'form-horizontal'
                    )
                )}}
            @include('commons.form.clients.data')
            {{Form::close()}}
        </div>


    </div><!--/.main-content -->
@endsection

@section('script_content')

    <script>
        function toggleType(val) {
            if (val == "1") {
                $('input[name="type"]#pj').prop('checked', true);
                $('section.section-pf').hide();
                $('section.section-pj').fadeIn('fast');
                $('section.section-pj').find('input').not("input#isention_ie,input#ie, input#foundation").attr('required', true);
                $('section.section-pf').find('input').attr('required', false);
//                $('section.section-pf').find('input').val("");
            } else {
                $('input[name="type"]#pf').prop('checked', true);
                $('section.section-pj').hide();
                $('section.section-pf').fadeIn('fast');
                $('section.section-pf').find('input').attr('required', true);
                $('section.section-pj').find('input').attr('required', false);
//                $('section.section-pj').find('input').val("");
            }
        }

        $(document).ready(function () {
            $('input[name="type"]').change(function () {
                toggleType($(this).val());
            });
            var type = '{{isset($Data) ? $Data->type : 1}}';
            toggleType(type);
        })
    </script>

    <script>
        function toggleIe(val) {
            if (val == 1) {
                $('input#ie').removeAttr('required');
            } else {
                $('input#ie').attr('required', true);
            }
        }

        $(document).ready(function () {
            $('input[name="isention_ie"]').change(function () {
                toggleIe($('input[name="isention_ie"]:checked').length > 0);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            @if($errors->has('password'))
            $('#changePassword').modal('show');
            @endif
        });
    </script>

    {{--<!-- Jquery Validation Plugin Js -->--}}
    @include('commons.layouts.inc.validation.js')

    {{--<!-- Jquery InputMask Js -->--}}
    @include('commons.layouts.inc.inputmask.js')

    {{--<!-- SweetAlert Plugin Js -->--}}
    {{--@include('layouts.inc.sweetalert.js')--}}

    {{--<!-- Jquery DataTable Plugin Js -->--}}
    {{--@include('layouts.inc.datatable.js')--}}

    {{Html::script('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js')}}

    @include('commons.layouts.inc.address.js')

@endsection
