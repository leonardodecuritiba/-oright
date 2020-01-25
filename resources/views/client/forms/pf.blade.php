<section class="section-pf">

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Html::decode(Form::label('name', 'Nome *', array('class' => 'col-md-4 control-label'))) !!}
        <div class="col-md-6">
            {{Form::text('name', old('name',(isset($Data) ? $Data->name : "")), ['id'=>'name','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="sex" class="col-md-4 control-label">Sexo</label>
        <div class="col-md-6">
            <input name="sex" type="radio" class="with-gap" value="0"
                   @if((isset($Data) && $Data->sex == 0) || (!isset($Data)) || old('sex') == 0) checked @endif/>
            <label for="pj">Feminino</label>
            <input name="sex" type="radio" class="with-gap" value="1"
                   @if((isset($Data) && $Data->sex == 1) || old('sex') == 1) checked @endif/>
            <label for="pf">Masculino</label>
        </div>
    </div>

    <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
        {!! Html::decode(Form::label('cpf', 'CPF *', array('class' => 'col-md-4 control-label'))) !!}
        <div class="col-md-6">
            {{Form::text('cpf', old('cpf',(isset($Data) ? $Data->getFormattedCpf() : "")), ['id'=>'cpf','class'=>'form-control show-cpf','minlength'=>'3', 'maxlength'=>'20', 'required'])}}
            @if ($errors->has('cpf'))
                <span class="help-block">
                    <strong>{{ $errors->first('cpf') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
        {!! Html::decode(Form::label('rg', 'RG *', array('class' => 'col-md-4 control-label'))) !!}
        <div class="col-md-6">
            {{Form::text('rg', old('rg',(isset($Data) ? $Data->getFormattedRg() : "")), ['id'=>'rg','class'=>'form-control show-rg','minlength'=>'3', 'maxlength'=>'20', 'required'])}}
            @if ($errors->has('rg'))
                <span class="help-block">
                    <strong>{{ $errors->first('rg') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
        {!! Html::decode(Form::label('birthday', 'Data Nascimento *', array('class' => 'col-md-4 control-label'))) !!}
        <div class="col-md-6">
            {{Form::text('birthday', old('birthday',(isset($Data) ? $Data->getFormattedBirthday() : "")), ['id'=>'birthday','class'=>'form-control show-date'])}}
            @if ($errors->has('birthday'))
                <span class="help-block">
                    <strong>{{ $errors->first('birthday') }}</strong>
                </span>
            @endif
        </div>
    </div>

</section>