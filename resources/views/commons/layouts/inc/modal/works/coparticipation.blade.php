
<div class="modal modal-fill" id="coparticipationModal" tabindex="-1" role="dialog" aria-labelledby="coparticipationModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Coparticipação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{Form::open(
            array(
                'route' => $route,
                'method'=>'POST',
                'class'=>'form-horizontal form_validation',
                )
            )}}
            {{Form::hidden('work_id', $Data->id)}}
            {{Form::hidden('user_id', '')}}
            <div class="modal-body">
                <div class="text-right">
                    <img src="{{asset('assets/images/logos/logo-b-p.png')}}"
                         alt="logo icon">
                </div>
                <div class="form-group">
                    {!! Html::decode(Form::label('email', 'Email *', array('class' => 'col-md-4 control-label'))) !!}
                    <div class="col-md-12">
                        {{Form::email('email', '',['class'=>'form-control','minlength'=>'3','maxlength'=>'100', 'required'])}}
                    </div>
                </div>
                <div class="form-group">
                    {!! Html::decode(Form::label('name', 'Nome *', array('class' => 'col-md-4 control-label'))) !!}
                    <div class="col-md-12">
                        {{Form::text('name', '',['class'=>'form-control','minlength'=>'3','maxlength'=>'100', 'required'])}}
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