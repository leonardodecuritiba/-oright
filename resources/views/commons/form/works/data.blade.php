<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Form row
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
@if(isset($Data))
    <h4 class="card-title"><strong>#{{$Data->id}} - {{$Data->title}}</strong></h4>
@endif

<div class="card-body">
    @if(isset($Data))
        <section class="registers">
            <div class="alert alert-{{$Data->getBlockchainStatusColor()}}" role="alert">
                {{$Data->getBlockchainStatusText()}}
            </div>

            <section class="alert">

                <p> Ao receber a confirmação de leitura do seu parceiro ou cliente, copie e cole o código blockchain e
                    insira junto ao selo de autenticidade que enviamos por email no momento em que se registrou na Orights.
                    Pronto! Agora é só enviar junto com seu projeto completo ao seu parceiro/cliente.
                </p>
            </section>
                <h6 class="text-uppercase mt-3">Registros</h6>

                <div class="form-row">
                    <label class="col-sm-2 col-form-label">Registro Web</label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext">{{$Data->private_key}}</p>
                    </div>
                </div>
                @if($Data->hasBlockchain())
                    <div class="form-row">
                        <label class="col-sm-2 col-form-label">Registro BlockChain</label>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">{{$Data->getBlockchainKey()}}</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-sm-2 col-form-label">ID Transação BlockChain</label>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">{{$Data->getTransactionId()}}</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-sm-2 col-form-label">Visualizar Documento</label>
                        <div class="col-sm-10">
                            <a class="btn btn-info" target="_blank" href="{{$Data->getGenerateHtmlLink()}}">Abrir</a>
                        </div>
                    </div>
                    {{--<div class="form-row">--}}
                    {{--<label class="col-sm-2 col-form-label">Visualizar Documento PDF</label>--}}
                    {{--<div class="col-sm-10">--}}
                    {{--<a class="btn btn-info" target="_blank" href="{{$Data->getGeneratePdfLink()}}">Baixar Documento</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-row">--}}
                    {{--<label class="col-sm-2 col-form-label">Visualizar HTML</label>--}}
                    {{--<div class="col-sm-10">--}}
                    {{--<a class="btn btn-info" target="_blank" href="{{$Data->getGenerateHtmlLink()}}">Abrir</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                @endif

            <hr>
        </section>
    @endif

    <section class="informations">

        <h6 class="text-uppercase mt-3">Informações @if(!isset($Data)) - Primeiro Passo @endif</h6>
        <hr class="hr-sm mb-2">

        @if(isset($Data) && ($Data->hasBlockchain()))
            <label class="col-sm-2 col-form-label">Capa do Trabalho</label>
            <div class="col-sm-10" data-provide="photoswipe">
                <a href="#">
                    <img style="max-height: 320px;" class="img-fluid" data-original-src="{{$Data->getLinkDownload()}}" src="{{$Data->getLinkDownload()}}">
                </a>
            </div>

            <label class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{$Data->getCategoryTitle()}}</p>
            </div>

            <label class="col-sm-2 col-form-label">Título</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{$Data->title}}</p>
            </div>

            <label class="col-sm-2 col-form-label">Descrições</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{$Data->descriptions}}</p>
            </div>

        @else
            {{--Cover--}}
            @if(isset($Data) && $Data->hasCover())

                <div class="form-row">

                    <div class="col-md-3" data-provide="photoswipe">
                        <a href="#">
                            <img style="max-height: 240px;" class="img-fluid" data-original-src="{{$Data->getLinkDownload()}}" src="{{$Data->getLinkDownload()}}">
                        </a>
                    </div>

                    <div class="form-group col-md-9">
                        {!! Html::decode(Form::label('cover', 'Alterar Capa do Trabalho <i class="fa fa-question-circle"
                            data-provide="tooltip"
                            data-placement="right"
                            data-tooltip-color="primary"
                            data-original-title="'.config('orights.works.cover.message').'"></i>', array('class' => 'col-form-label'))) !!}
                        <input name="cover" type="file" data-provide="dropify">
                    </div>
                </div>
            @else

                <div class="form-row">
                    <div class="form-group col-md-12">
                        {!! Html::decode(Form::label('cover', 'Capa do Trabalho <i class="fa fa-question-circle"
                            data-provide="tooltip"
                            data-placement="right"
                            data-tooltip-color="primary"
                            data-original-title="'.config('orights.works.cover.message').'"></i>', array('class' => 'col-form-label'))) !!}
                        <input name="cover" type="file" data-provide="dropify" required>
                    </div>
                </div>

            @endif


            <div class="form-row">
                <div class="form-group col-md-12">
                    {!! Html::decode(Form::label('category_id', 'Categoria *', array('class' => 'col-form-label'))) !!}
                    {{Form::select('category_id', $Page->auxiliar['categories'], old('category_id',(isset($Data) ? $Data->category_id : '')), ['placeholder' => 'Escolha a Categoria', 'class'=>'form-control show-tick','id' => 'categories', 'required'])}}
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            {{--Título--}}
            <div class="form-row">
                <div class="form-group col-md-12">
                    {!! Html::decode(Form::label('title', 'Título *', array('class' => 'col-form-label'))) !!}
                    {{Form::text('title', old('title',(isset($Data) ? $Data->title : "")), ['id'=>'title_work','placeholder'=>'Título','class'=>'form-control','minlength'=>'3', 'maxlength'=>'200', 'required'])}}
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            {{--Descrições--}}
            <div class="form-row">
                <div class="form-group col-md-12">
                    {!! Html::decode(Form::label('descriptions', 'Descrição *', array('class' => 'col-form-label'))) !!}
                    {{Form::textarea('descriptions', old('descriptions',(isset($Data) ? $Data->descriptions : "")), ['id'=>'descriptions_work','placeholder'=>'Descrição','class'=>'form-control','minlength'=>'3', 'maxlength'=>'500', 'required'])}}
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        @endif
    </section>

    @if(isset($Data))

        <hr>
        <section class="attaches">
            <h6 class="text-uppercase mt-3">Anexos</h6>

                @if(!$Data->hasBlockchain())
                    <div class="form-group col-md-12">
                        <button type="button" href="#" data-toggle="modal" data-target="#attachesModal" class="btn btn-info btn-block"><i class="fa fa-plus"></i> Adicionar Anexo</button>
                    </div>
                @endif

                <hr class="hr-sm mb-2">
                <table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($Data->work_files as $sel)
                            <tr>
                                <td>{{$sel->id}}</td>
                                <td>{{$sel->getShortTitle()}}</td>
                                <td>{{$sel->getShortDescriptions()}}</td>
                                <td>
                                    <a href="{{$sel->getLinkDownload()}}" target="_blank"
                                       class="btn btn-simple btn-light btn-xs btn-icon"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Baixar"><i class="material-icons">file_download</i></a>
                                    @if((!isset($Data)) || (isset($Data) && (!$Data->hasBlockchain())))
                                        @include('commons.layouts.inc.buttons.delete',[
                                        'field_delete' => 'Anexo',
                                        'field_delete_route' => route('client_work_files.destroy',$sel['id'])])
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <hr>
        </section>

        <section class="coparticipations">
            <h6 class="text-uppercase mt-3">Coparticipações</h6>

            @if(!$Data->hasBlockchain())
                <div class="form-group col-md-12">
                    <button type="button" href="#" data-toggle="modal" data-target="#coparticipationModal" class="btn btn-info btn-block"><i class="fa fa-plus"></i> Compartilhar com seu Cliente</button>
                </div>
            @endif

            <hr class="hr-sm mb-2">
            <table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Confirmado em</th>
                    <th>Nome</th>
                    <th>Email</th>
                    @if(!$Data->hasBlockchain())
                        <th>Ações</th>
                    @endif
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Confirmado em</th>
                    <th>Nome</th>
                    <th>Email</th>
                    @if(!$Data->hasBlockchain())
                        <th>Ações</th>
                    @endif
                </tr>
                </tfoot>
                <tbody>
                @foreach($Data->coparticionaries as $sel)
                    <tr class="{{(!$sel->isConfirmated()) ? 'bg-pale-danger':''}}">
                        <td>{{$sel->id}}</td>
                        <td data-order="{{$sel->getConfirmatedAtTime()}}">{{$sel->confirmatedText()}}</td>
                        <td>{{$sel->getShortName()}}</td>
                        <td>{{$sel->getShortEmail()}}</td>
                        @if(!$Data->hasBlockchain())
                            <td>
                                @if(!$sel->isConfirmated())
                                    <a @if(Auth::user()->itsMe($Data->owner->user_id)))
                                            href="{{route('client_coparcenaries.resend',$sel->id)}}"
                                        @else
                                            href="{{route('coparcenaries.resend',$sel->id)}}"
                                        @endif
                                       class="btn btn-simple btn-info btn-xs "
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Compartilhar trabalho"><i class="material-icons">send</i></a>
                                @endif
                                @include('commons.layouts.inc.buttons.delete',[
                                'field_delete' => 'Coparticipação',
                                'field_delete_route' => route('client_coparcenaries.destroy',$sel['id'])])
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>

    @endif


</div>

@if((!isset($Data)) || (isset($Data) && (!$Data->hasBlockchain())))
    <footer class="card-footer text-right">
        @if(isset($Data))
            {{Form::hidden('generate',0)}}
            {{--<a class="btn btn-info" href="{{$Data->getGenerateBlockchainLink()}}">Gerar Copyright Blockchain</a>--}}
            <button class="btn btn-info pull-left" type="button"
                    data-toggle="modal" data-target="#generateBlockchain">Salvar e Gerar Copyright Blockchain</button>
        @endif
        <button class="btn btn-info" type="submit">@if(!isset($Data)) Próximo Passo @else Salvar @endif</button>
    </footer>
@endif