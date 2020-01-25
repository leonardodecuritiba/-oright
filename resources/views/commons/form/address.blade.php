<?php $DataAddress = ( isset( $Data ) ? $Data->address : NULL ); ?>
<h6 class="text-uppercase mt-3">Dados de Endereço</h6>
<hr class="hr-sm mb-2">
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Html::decode(Form::label('street', 'Endereço', array('class' => 'col-form-label'))) !!}
        {{Form::text('street', old('street', (($DataAddress != null) ? $DataAddress->street : '')), ['class'=>'form-control', 'maxlength'=>'125',  'required'])}}
    </div>
    <div class="form-group col-md-2">
        {!! Html::decode(Form::label('number', 'Número', array('class' => 'col-form-label'))) !!}
        {{Form::text('number', old('number', (($DataAddress != null) ? $DataAddress->number : '')), ['class'=>'form-control show-only-numbers', 'maxlength'=>'7',  'required'])}}
    </div>
    <div class="form-group col-md-4">
        {!! Html::decode(Form::label('complement', 'Complemento', array('class' => 'col-form-label'))) !!}
        {{Form::text('complement', old('complement', (($DataAddress != null) ? $DataAddress->complement : '')), ['class'=>'form-control', 'maxlength'=>'50', ])}}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        {!! Html::decode(Form::label('district', 'Bairro', array('class' => 'col-form-label'))) !!}
        {{Form::text('district', old('district', (($DataAddress != null) ? $DataAddress->district : '')), ['class'=>'form-control', 'maxlength'=>'72',  'required'])}}
    </div>
    <div class="form-group col-md-2">
        {!! Html::decode(Form::label('zip', 'CEP', array('class' => 'col-form-label'))) !!}
        {{Form::text('zip', old('zip', (($DataAddress != null) ? $DataAddress->getFormatedZip() : '')), ['class'=>'form-control show-cep', 'multiple', 'maxlength'=>'16',  'required'])}}
    </div>
    <div class="form-group col-md-3">
        {!! Html::decode(Form::label('state', 'Estado', array('class' => 'col-form-label'))) !!}
        {{Form::select('state_id', $Page->auxiliar['states'], old('state_id',(isset($DataAddress) ? $DataAddress->state_id : '')), ['placeholder' => 'Escolha o Estado', 'class'=>'form-control show-tick','id' => 'select-state', 'required'])}}
    </div>
    <div class="form-group col-md-3">
        {!! Html::decode(Form::label('city', 'Cidade', array('class' => 'col-form-label'))) !!}
        {{Form::select('city_id', [], '', ['placeholder' => 'Escolha a Cidade', 'class'=>'form-control show-tick','id' => 'select-city', 'required'])}}
    </div>
</div>


<script>
    var _STATE_ID_ = {{old('state_id',((isset($DataAddress)) ? $DataAddress->state_id : ''))}};
    var _CITY_ID_ = {{old('city_id', ((isset($DataAddress)) ? $DataAddress->city_id : ''))}};
</script>