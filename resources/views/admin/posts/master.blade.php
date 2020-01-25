@extends('commons.layouts.app')

@section('title', $Page->page_title)

{{--@section('route', route('cliente'))--}}

@section('page_modals')
    @include('commons.layouts.inc.modal.show-comment')

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
            @if(isset($Data))
                {{Form::model($Data,
                array(
                    'route' => ['posts.update', $Data->id],
                    'method'=>'PATCH',
                    'files'=>true,
                    'data-provide'=> "validation",
                    'data-disable'=>'false'
                )
                )}}
            @else
                {{Form::open(array(
                    'route' => ['posts.store'],
                    'method'=>'POST',
                    'files'=>true,
                    'data-provide'=> "validation",
                    'data-disable'=>'false'
                )
                )}}
            @endif
                @include('admin.posts.form.data')
            {{Form::close()}}
        </div>

        @if(isset($Data))
            <div class="card">
                <h4 class="card-title"><strong>{{count($Data->comments)}}</strong> Comentários</h4>

                <div class="card-content">
                    <div class="card-body">

                        <table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Situação</th>
                                <th>Cadastrado</th>
                                <th>Usuário</th>
                                <th>Comentário</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Situação</th>
                                <th>Cadastrado</th>
                                <th>Usuário</th>
                                <th>Comentário</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($Data->comments as $s)
	                            <?php
	                            $sel = [
		                            'id'              => $s->id,
		                            'name'            => $s->getShortContent(),
		                            'user'            => $s->getUserShortName(),
		                            'short_content'   => $s->getShortContent(),
		                            'content'         => $s->content,
		                            'created_at'      => $s->getCreatedAtFormatted(),
		                            'created_at_time' => $s->getCreatedAtTime(),
		                            'active'          => $s->getActiveFullResponse()
	                            ];
	                            ?>
                                <tr class="{{(!$sel['active']['value']) ? 'bg-pale-danger':''}}">
                                    <td>{{$sel['id']}}</td>
                                    <td>
                                        <span class="badge badge-{{$sel['active']['active_color']}}">{{$sel['active']['active_text']}}</span>
                                    </td>
                                    <td data-order="{{$sel['created_at_time']}}">{{$sel['created_at']}}</td>
                                    <td>{{$sel['user']}}</td>
                                    <td>{{$sel['short_content']}}</td>
                                    <td>
                                        @include('commons.layouts.inc.buttons.active',['active'=>$sel['active']])
                                        @include('commons.layouts.inc.buttons.view-popup',['sel' => $sel])
                                        @include('commons.layouts.inc.buttons.delete', ['field_delete' => 'Comentário', 'field_delete_route' => route('comments.destroy',$sel['id'])])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('commons.layouts.inc.loading')
            </div>
        @endif


    </div><!--/.main-content -->
@endsection


@section('script_content')
    @include('commons.layouts.inc.active.js')

    @include('commons.layouts.inc.comment.js')

    @include('commons.layouts.inc.datatable.js')

    @include('commons.layouts.inc.sweetalert.js')
@endsection