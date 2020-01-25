<section class="section-pj">

    <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
        {!! Html::decode(Form::label('company_name', 'Razão Social *', array('class' => 'col-md-4 control-label'))) !!}
        <div class="col-md-6">
            {{Form::text('company_name', old('company_name',(isset($Data) ? $Data->company_name : "")), ['id'=>'company_name','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
            @if ($errors->has('company_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('company_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('fantasy_name') ? ' has-error' : '' }}">
        {!! Html::decode(Form::label('fantasy_name', 'Nome Fantasia *', array('class' => 'col-md-4 control-label'))) !!}
        <div class="col-md-6">
            {{Form::text('fantasy_name', old('fantasy_name',(isset($Data) ? $Data->fantasy_name : "")), ['id'=>'fantasy_name','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
            @if ($errors->has('fantasy_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('fantasy_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
        {!! Html::decode(Form::label('cnpj', 'CNPJ *', array('class' => 'col-md-4 control-label'))) !!}
        <div class="col-md-6">
            {{Form::text('cnpj', old('cnpj',(isset($Data) ? $Data->cnpj : "")), ['id'=>'cnpj','class'=>'form-control show-cnpj','minlength'=>'3', 'maxlength'=>'20', 'required'])}}
            @if ($errors->has('cnpj'))
                <span class="help-block">
                    <strong>{{ $errors->first('cnpj') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('isention_ie') ? ' has-error' : '' }}">
        {!! Html::decode(Form::label('isention_ie', 'Isenção I.E.', array('class' => 'col-md-4 control-label'))) !!}
        <div class="col-md-6">
            <input type="checkbox" name="isention_ie" id="isention_ie"
                    {{((isset($Data) && ($Data->isention_ie)) ? "checked" : "")}}>
        </div>
    </div>

    <div class="form-group{{ $errors->has('ie') ? ' has-error' : '' }}">
        {!! Html::decode(Form::label('ie', 'Insc. Estadual', array('class' => 'col-md-4 control-label'))) !!}
        <div class="col-md-6">
            {{Form::text('ie', old('ie',(isset($Data) ? $Data->ie : "")), ['id'=>'ie','class'=>'form-control show-ie','minlength'=>'3', 'maxlength'=>'20', (isset($Data) && ($Data->isention_ie == 0)) ? 'required' : ''])}}
            @if ($errors->has('ie'))
                <span class="help-block">
                    <strong>{{ $errors->first('ie') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('foundation') ? ' has-error' : '' }}">
        {!! Html::decode(Form::label('foundation', 'Data Fundação *', array('class' => 'col-md-4 control-label'))) !!}
        <div class="col-md-6">
            {{Form::text('foundation', old('foundation',(isset($Data) ? $Data->getFormattedFoudation() : "")), ['id'=>'foundation','class'=>'form-control show-date'])}}
            @if ($errors->has('foundation'))
                <span class="help-block">
                    <strong>{{ $errors->first('foundation') }}</strong>
                </span>
            @endif
        </div>
    </div>

</section>