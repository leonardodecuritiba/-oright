<section class="section-pf">
    <h6 class="text-uppercase mt-3">Pessoa Física</h6>
    <hr class="hr-sm mb-2">
    <div class="form-row">

        <div class="form-group col-md-4">
            {!! Html::decode(Form::label('cpf', 'CPF *', array('class' => 'col-form-label'))) !!}
            {{Form::text('cpf', old('cpf',(isset($Data) ? $Data->getFormattedCpf() : "")), ['id'=>'cpf','placeholder'=>'CPF','class'=>'form-control show-cpf','minlength'=>'3', 'maxlength'=>'20', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group col-md-4">
            {!! Html::decode(Form::label('rg', 'RG *', array('class' => 'col-form-label'))) !!}
            {{Form::text('rg', old('rg',(isset($Data) ? $Data->getFormattedRg() : "")), ['id'=>'rg','placeholder'=>'RG','class'=>'form-control show-rg','minlength'=>'3', 'maxlength'=>'20', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-4">
            {!! Html::decode(Form::label('birthday', 'Data Nascimento *', array('class' => 'col-form-label'))) !!}
            {{Form::text('birthday', old('birthday',(isset($Data) ? $Data->getFormattedBirthday() : "")), ['id'=>'birthday','data-provide'=>"datepicker", 'data-date-end-date'=>'0d', 'class'=>'form-control', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>

</section>