@extends('commons.layouts.app')

@section('title', $Page->page_title)

{{--@section('route', route('cliente'))--}}

@section('page_modals')
    @if(!$Data->hasBlockchain())
        @include('commons.layouts.inc.modal.works.attaches',['route'=>'work_files.store'])
        @include('commons.layouts.inc.modal.works.coparticipation',['route'=>'coparcenaries.store'])
    @endif
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
                    'route' => ['works.update', $Data->id],
                    'files'=>true,
                    'method'=>'PATCH',
                    'data-provide'=> "validation",
                    'data-disable'=>"false"
                )
                )}}
            @include('commons.form.works.data')
            {{Form::close()}}
        </div>


    </div><!--/.main-content -->
@endsection


@section('script_content')

    @include('commons.layouts.inc.inputmask.js')

    @include('commons.layouts.inc.datatable.js')

    @include('commons.layouts.inc.sweetalert.js')

@endsection