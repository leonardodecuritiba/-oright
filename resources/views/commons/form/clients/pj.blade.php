<section class="section-pj">

    <h6 class="text-uppercase mt-3">Pessoa Jurídica</h6>
    <hr class="hr-sm mb-2">
    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Html::decode(Form::label('company_name', 'Razão Social *', array('class' => 'col-form-label'))) !!}
            {{Form::text('company_name', old('company_name',(isset($Data) ? $Data->company_name : "")), ['id'=>'company_name','placeholder'=>'Razão Social','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group col-md-6">
            {!! Html::decode(Form::label('fantasy_name', 'Nome Fantasia *', array('class' => 'col-form-label'))) !!}
            {{Form::text('fantasy_name', old('fantasy_name',(isset($Data) ? $Data->fantasy_name : "")), ['id'=>'fantasy_name','placeholder'=>'Nome Fantasia','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-5">
            {!! Html::decode(Form::label('cnpj', 'CNPJ *', array('class' => 'col-form-label'))) !!}
            {{Form::text('cnpj', old('cnpj',(isset($Data) ? $Data->cnpj : "")), ['id'=>'cnpj','class'=>'form-control show-cnpj','minlength'=>'3', 'maxlength'=>'20', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group col-md-5">
            {!! Html::decode(Form::label('ie', 'Insc. Estadual', array('class' => 'col-form-label'))) !!}
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input is-invalid" name="isention_ie" id="isention_ie"
                        {{((isset($Data) && ($Data->isention_ie)) ? "checked" : "")}}>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Isento?</span>
            </label>
            {{Form::text('ie', old('ie',(isset($Data) ? $Data->ie : "")), ['id'=>'ie','class'=>'form-control show-ie','minlength'=>'3', 'maxlength'=>'20', (isset($Data) && ($Data->isention_ie == 0)) ? 'required' : ''])}}
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group col-md-2">
            {!! Html::decode(Form::label('foundation', 'Data Fundação *', array('class' => 'col-form-label'))) !!}
            {{Form::text('foundation', old('foundation',(isset($Data) ? $Data->getFormattedFoudation() : "")), ['id'=>'foundation','class'=>'form-control','data-provide'=>"datepicker", 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>

</section>