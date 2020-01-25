@extends('commons.layouts.app')

@section('title', $Page->page_title)

{{--@section('route', route('cliente'))--}}

@if(isset($Data))
    @section('page_modals')
        @include('commons.layouts.inc.modal.show-comment')

    @endsection
@endif

@section('page_content')
    <!-- Main container -->

    <header class="header bg-ui-general">
        <div class="header-info">
            <h1 class="header-title">
                <strong>{{$Page->main_title}}</strong>
                @if(isset($Data))
                    <small>
                        Saldo Disponível: <b>{{trans_choice('pages.data.registers', $Data->registers, ['value' => $Data->registers])}}</b>
                    </small>
                @endif
            </h1>
        </div>
    </header><!--/.header -->


    <div class="main-content">


        @if(isset($Data))

            @if (!$Data->isFinished())
                <div class="alert alert-danger" role="alert">
                    {{$Data->getFinishedText()}}
                </div>
            @endif
            @if (!$Data->isVerified())
                <div class="alert alert-danger" role="alert">
                    {{$Data->getVerifiedText()}}
                </div>
            @endif

            @if(!$Data->user->active)
                <div class="alert alert-danger" role="alert">
                    Cliente {{$Data->user->getActiveText()}}
                </div>
            @endif

        @endif


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
                    'route' => ['clients.update', $Data->id],
                    'method'=>'PATCH',
                    'data-provide'=> "validation",
                    'data-disable'=>'false'
                )
                )}}
            @else
                {{Form::open(array(
                    'route' => ['clients.store'],
                    'method'=>'POST',
                    'data-provide'=> "validation",
                    'data-disable'=>'false'
                )
                )}}
            @endif
            @include('commons.form.clients.data')

            {{Form::close()}}
        </div>

        @if(isset($Data))

            <!--
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            | Works
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            !-->
            <div class="card">
                <h4 class="card-title"><strong>{{count($Data->works)}}</strong> Trabalhos</h4>

                <div class="card-content">
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
                            @foreach($Data->works as $s)
							    <?php
							    $sel = $s->getMapList();
							    ?>
                                <tr>
                                    <td>{{$sel['id']}}</td>
                                    <td data-order="{{$sel['created_at_time']}}">{{$sel['created_at']}}</td>
                                    <td>{{$sel['blockchain_text']}}</td>
                                    <td>{{$sel['title']}}</td>
                                    <td>{{$sel['descriptions']}}</td>
                                    <td>{{$sel['category']}}</td>
                                    <td>
                                        @include('commons.layouts.inc.buttons.edit', ['field_edit_route' => route('works.edit',$sel['id'])])
                                        @include('commons.layouts.inc.buttons.delete', ['field_delete' => 'Trabalho', 'field_delete_route' => route('works.destroy',$sel['id'])])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('commons.layouts.inc.loading')
            </div>


            <!--
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            | Comments
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            !-->
            <div class="card">
                <h4 class="card-title"><strong>{{count($Data->user->comments)}}</strong> Comentários</h4>

                <div class="card-content">
                    <div class="card-body">

                        <table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Situação</th>
                                <th>Cadastrado</th>
                                <th>Publicação</th>
                                <th>Comentário</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Situação</th>
                                <th>Cadastrado</th>
                                <th>Publicação</th>
                                <th>Comentário</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($Data->user->comments as $s)
							    <?php
							    $sel = [
								    'id'              => $s->id,
								    'name'            => $s->getShortContent(),
								    'user'            => $s->getUserShortName(),
								    'short_content'   => $s->getShortContent(),
								    'content'         => $s->content,
								    'post'            => $s->getPostShortName(),
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
                                    <td>{{$sel['post']}}</td>
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


            <!--
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            | Registers
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            !-->
            <div class="card">
                <h4 class="card-title"><strong>{{count($Data->registers_all)}}</strong> Movimentações</h4>

                <div class="card-content">
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
                            @foreach($Data->registers_all as $s)
                                <?php
                                $sel = [
                                    'id'                => $s->id,
                                    'type'              => $s->getType(),
                                    'description'       => $s->getDescription(),
                                    'url'               => $s->getAdminUrl(),
                                    'value'             => $s->getValue(),
                                    'value_formatted'   => $s->getValue2Currency(),
                                    'quantity'          => $s->quantity,
                                    'color'             => $s->getColor(),
                                ];
                                ?>

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
                </div>
                @include('commons.layouts.inc.loading')
            </div>
        @endif


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
            var type = '{{(isset($Data)) ? $Data->type : 1}}';
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


    {{--<!-- Jquery InputMask Js -->--}}
    @include('commons.layouts.inc.address.js')

    @include('commons.layouts.inc.inputmask.js')

    @if(isset($Data))
        @include('commons.layouts.inc.active.js')

        @include('commons.layouts.inc.comment.js')

        @include('commons.layouts.inc.datatable.js')

        @include('commons.layouts.inc.sweetalert.js')

    @endif
@endsection