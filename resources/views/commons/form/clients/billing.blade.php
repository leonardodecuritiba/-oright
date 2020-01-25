<?php $credit_card = $MoipData->billing_info->credit_cards; ?>
{{Form::hidden('payment_method','CREDIT_CARD')}}

@if(empty($credit_card))
    {{Form::hidden('new_card',1)}}
    <h6 class="text-uppercase mt-3">Dados de Pagamento (CARTÃO DE CRÉDITO)</h6>
    <hr class="hr-sm mb-2">
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('billing_info.holder_name', 'Nome do portador', array('class' => 'col-form-label'))) !!}
            {{Form::text('billing_info[holder_name]', $Client->name, ['id' => 'billing_info[holder_name]', 'class'=>'form-control', 'required'])}}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-8">
            {!! Html::decode(Form::label('number', 'Número', array('class' => 'col-form-label'))) !!}
            {{Form::text('billing_info[number]', '5555666677778884', ['id' => 'billing_info[number]', 'class'=>'form-control', 'required'])}}
        </div>
        <div class="form-group col-md-2">
            {!! Html::decode(Form::label('expiration_month', 'Mês de Expiração.', array('class' => 'col-form-label'))) !!}
            {{Form::select('billing_info[expiration_month]', $Page->auxiliar['expiration_months'],  '', ['id' => 'billing_info[expiration_month]', 'class'=>'form-control', 'required'])}}
        </div>
        <div class="form-group col-md-2">
            {!! Html::decode(Form::label('expiration_year', 'Ano de Expiração', array('class' => 'col-form-label'))) !!}
            {{Form::select('billing_info[expiration_year]', $Page->auxiliar['expiration_years'], '', ['id' => 'billing_info[expiration_year]', 'class'=>'form-control', 'required'])}}
        </div>
    </div>
@else
    <?php $card = $credit_card[0]; ?>
    {{Form::hidden('new_card',0)}}
    <h6 class="text-uppercase mt-3">Dados de Pagamento (CARTÃO DE CRÉDITO)</h6>

    <div class="form-row">
        <label class="col-sm-2 col-form-label">Bandeira</label>
        <div class="col-sm-6">
            <p class="form-control-plaintext"><b>{{$card->brand}}</b></p>
        </div>
    </div>
    <div class="form-row">
        <label class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-6">
            <p class="form-control-plaintext"><b>{{$card->holder_name}}</b></p>
        </div>
    </div>
    <div class="form-row">
        <label class="col-sm-2 col-form-label">Número</label>
        <div class="col-sm-6">
            <p class="form-control-plaintext">
                <b>{{$card->first_six_digits}}</b>.XXXXXX.<b>{{$card->last_four_digits}}</b></p>
        </div>
    </div>
    <div class="form-row">
        <label class="col-sm-2 col-form-label">Expiração</label>
        <div class="col-sm-6">
            <p class="form-control-plaintext"><b>{{$card->expiration_month.'/'.$card->expiration_year}}</b></p>
        </div>
    </div>

@endif
