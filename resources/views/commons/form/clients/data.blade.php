<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Form row
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->

@if(isset($Data))
    <h4 class="card-title"><strong>#{{$Data->id}} - {{$Data->getShortName()}}</strong></h4>
@else
    <h4 class="card-title"><strong>Dados do Cliente</strong></h4>
@endif

<div class="card-body">

    <h6 class="text-uppercase mt-3">Dados de Acesso</h6>
    <hr class="hr-sm mb-2">

    @if(isset($Data))
        <div class="form-row">
            <label class="col-sm-2 col-form-label">Código</label>
            <div class="col-sm-4">
                <p class="form-control-plaintext">{{$Data->private_key}}</p>
            </div>
            @if($Data->user->active)
                <div class="col-sm-6">
                    <button type="button" data-toggle="modal"
                        data-target="#removeAcount"
                        class="btn btn-danger btn-xs pull-right">
                        Remover Conta
                    </button>
                </div>
            @endif
        </div>
        <div class="form-row">
            <label class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-2">
                <p class="form-control-plaintext">{{$Data->id}}</p>
            </div>
        </div>
        <div class="form-row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-6">
                <p class="form-control-plaintext">{{$Data->getShortEmail()}}</p>
            </div>
        </div>
        <div class="form-row">
            {!! Html::decode(Form::label('name', 'Nome *', array('class' => 'col-sm-2 col-form-label'))) !!}
            <div class="col-sm-10">
                {{Form::text('name', $Data->name, ['id'=>'name','placeholder'=>'Nome','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
            </div>
        </div>

    @else
        <div class="form-row">
            <div class="form-group col-md-12">
                {!! Html::decode(Form::label('name', 'Nome *', array('class' => 'col-form-label'))) !!}
                {{Form::text('name', '', ['id'=>'name','placeholder'=>'Nome','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {!! Html::decode(Form::label('email', 'Email *', array('class' => 'col-form-label'))) !!}
                {{Form::email('email', '', ['id'=>'email','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group col-md-6">
                {!! Html::decode(Form::label('password', 'Senha *', array('class' => 'col-form-label'))) !!}
                {{Form::text('password', '', ['id'=>'password','placeholder'=>'Senha','class'=>'form-control','minlength'=>'3', 'maxlength'=>'20', 'required'])}}
                <div class="invalid-feedback"></div>
            </div>
        </div>

    @endif

    @if((isset($Data)) && (!$Data->isFinished()))
        <h6 class="text-uppercase mt-3">Tipo de Cadastro</h6>
        <hr class="hr-sm mb-2">

        <div class="col">
            <div class="form-check form-check-inline">
                <label class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" name="type" value="0" @if(isset($Data) && ($Data->type == 0)) checked="" @endif>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Pessoa Física</span>
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" name="type" value="1" @if(isset($Data) && ($Data->type == 1)) checked="" @endif>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Pessoa Jurídica</span>
                </label>
            </div>
        </div>
    @endif

    @include('commons.form.clients.pf')

    @include('commons.form.clients.pj')

    @include('commons.form.address')

    @include('commons.form.contact')

</div>

<footer class="card-footer text-right">
    <button class="btn btn-secondary" type="reset">Cancelar</button>
    <button class="btn btn-info" type="submit">Salvar</button>
</footer>