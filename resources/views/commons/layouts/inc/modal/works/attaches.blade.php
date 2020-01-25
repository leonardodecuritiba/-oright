<div class="modal modal-fill" id="attachesModal" tabindex="-1" role="dialog" aria-labelledby="attachesModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Anexo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{Form::open(
            array(
                'route' => $route,
                'method'=>'POST',
                'class'=>'form-horizontal form_validation',
                'files'=>true,
                )
            )}}
            {{Form::hidden('work_id', $Data->id)}}
            <div class="modal-body">
                <div class="text-right">
                    <img src="{{asset('assets/images/logos/logo-b-p.png')}}"
                         alt="logo icon">
                </div>
                <div class="form-group">
                    {!! Html::decode(Form::label('title', 'Título *', array('class' => 'col-md-4 control-label'))) !!}
                    <div class="col-md-12">
                        {{Form::text('title', '',['class'=>'form-control','minlength'=>'3','maxlength'=>'200', 'required'])}}
                    </div>
                </div>
                <div class="form-group">
                    {!! Html::decode(Form::label('descriptions', 'Descrição *', array('class' => 'col-md-4 control-label'))) !!}
                    <div class="col-md-12">
                        {{Form::textarea('descriptions', '',['class'=>'form-control','minlength'=>'3','maxlength'=>'500', 'rows'=>'2','required'])}}
                    </div>
                </div>
                <div class="form-group">
                    <!--
                    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                    | Basic
                    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                    !-->
                    <div class="col-md-12">
                        <h6 class="mb-1">Arquivo <i class="fa fa-question-circle"
                                                    data-provide="tooltip"
                                                    data-placement="right"
                                                    data-tooltip-color="primary"
                                                    data-original-title="Extensões permitidas: jpeg, png, bmp, gif, ou svg"></i></h6>
                        <input name="link" type="file" data-provide="dropify" required>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-info">Salvar</button>
            </div>

            {{Form::close()}}
        </div>
    </div>
</div>