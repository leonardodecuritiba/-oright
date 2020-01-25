<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Form row
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
@if(isset($Data))
    <h4 class="card-title"><strong>#{{$Data->id}} - {{$Data->getShortName()}}</strong></h4>
@else
    <h4 class="card-title"><strong>Dados do Plano</strong></h4>
@endif

<div class="card-body">

    <h6 class="text-uppercase mt-3">Informações</h6>
    <hr class="hr-sm mb-2">
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('name', 'Nome *', array('class' => 'col-form-label'))) !!}
            {{Form::text('name', old('name',(isset($Data) ? $Data->name : "")), ['id'=>'name','placeholder'=>'Nome','class'=>'form-control','minlength'=>'3', 'maxlength'=>'65', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('amount', 'Valor *', array('class' => 'col-form-label'))) !!}
            {{Form::text('amount', old('amount',(isset($Data) ? $Data->getAmount() : "")), ['id'=>'amount','placeholder'=>'Valor','class'=>'form-control', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('registers', 'Registros de Propriedade *', array('class' => 'col-form-label'))) !!}
            {{Form::text('registers', old('registers',(isset($Data) ? $Data->registers : "")), ['id'=>'registers','placeholder'=>'Registros de Propriedade','class'=>'form-control', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="custom-control custom-control-lg custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="free" @if(isset($Data) && ($Data->free)) checked="" @endif>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Habilitar período gratuito</span>
            </label>
        </div>
        <div class="form-group col-md-6">
            {!! Html::decode(Form::label('free_days', 'Dias gratuitos *', array('class' => 'col-form-label'))) !!}
            {{Form::number('free_days', old('free_days',(isset($Data) ? $Data->free_days : "")), ['id'=>'free_days','class'=>'form-control', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('description', 'Descrição *', array('class' => 'col-form-label'))) !!}
            {{Form::textarea('description', old('description',(isset($Data) ? $Data->description : "")), ['id'=>'description','placeholder'=>'Descrição','class'=>'form-control','minlength'=>'3', 'maxlength'=>'65', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('paypal_button', 'HTML Botão do PayPal', array('class' => 'col-form-label'))) !!}
            {{Form::textarea('paypal_button', old('paypal_button',(isset($Data) ? $Data->paypal_button : "")), ['id'=>'description','placeholder'=>'HTML Botão do PayPal','class'=>'form-control','minlength'=>'3', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>

    <h5>Detalhes do Plano</h5>
    @foreach($Page->auxiliar['descriptions'] as $i => $description)
        <div class="form-group col-md-12">
            <label class="custom-control custom-control-lg custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="option[{{$i}}]" @if(isset($Data) && ($Data->getOption($i))) checked="" @endif>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">{{$description}}</span>
            </label>
        </div>
    @endforeach
</div>


<footer class="card-footer text-right">
    <button class="btn btn-primary" type="submit">Salvar</button>
</footer>