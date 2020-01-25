<?php $DataContact = ( isset( $Data ) ? $Data->contact : NULL ); ?>

<h6 class="text-uppercase mt-3">Dados de Contato</h6>
<hr class="hr-sm mb-2">
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Html::decode(Form::label('phone', 'Telefone', array('class' => 'col-form-label'))) !!}
        {{Form::text('phone', old('phone',(($DataContact != null) ? $DataContact->getFormatedPhone() : '')), ['id' => 'phone', 'class'=>'form-control show-cellphone', 'required'])}}
    </div>
</div>