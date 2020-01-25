<div class="modal modal-fill" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Efetuar pagamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{Form::open(
                array(
                    'route' => 'index',
                    'method'=>'POST',
                    'class'=>'form-horizontal form_validation',
                    'files'=>true,
                    )
                )}}
                {{Form::hidden('new_credit_card', ($MoipCreditCard == NULL) ? 1 : 0)}}
                <div class="modal-body">
                    <div class="text-right">
                        <img src="{{asset('assets/images/logos/logo-b-p.png')}}"
                             alt="logo icon">
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">Situação</dt>
                        <dd class="col-sm-9" id="situation"></dd>
                        <dt class="col-sm-3">Plano</dt>
                        <dd class="col-sm-9" id="plan"></dd>
                        <dt class="col-sm-3">Valor</dt>
                        <dd class="col-sm-9" id="value"></dd>
                    </dl>

                    <h4 class="card-inside-title">Cartão de Crédito</h4>

                    @if($MoipCreditCard != NULL)

                        <div class="form-row">
                            <div class="form-check form-check-inline">
                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="credit-card-option" checked="" value="current">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Usar cartão atual</span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="credit-card-option" value="new">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Alterar Cartão</span>
                                </label>
                            </div>
                        </div>

                        <section class="credit-card-current">

                            <div class="form-row">
                                <label class="col-sm-2 col-form-label">Número</label>
                                <div class="col-sm-4">
                                    <p class="form-control-plaintext">{{$MoipCreditCard->first_six_digits}}XXXXXX{{$MoipCreditCard->last_four_digits}} / {{$MoipCreditCard->brand}}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-sm-2 col-form-label">Expiração</label>
                                <div class="col-sm-4">
                                    <p class="form-control-plaintext">{{$MoipCreditCard->expiration_month}}/{{$MoipCreditCard->expiration_year}}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-4">
                                    <p class="form-control-plaintext">{{$MoipCreditCard->holder_name}}</p>
                                </div>
                            </div>

                        </section>

                    @endif

                    <section class="credit-card-new">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                {!! Html::decode(Form::label('card_number', 'Número', array('class' => 'col-form-label'))) !!}
                                {{Form::text('card_number', '', ['id' => 'card_number', 'class'=>'form-control show-credit-card', 'placeholder'=>'Número', 'required'])}}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Html::decode(Form::label('expiration_month', 'Mês', array('class' => 'col-form-label'))) !!}
                                {{Form::text('expiration_month', '', ['id' => 'expiration_month', 'class'=>'form-control show-date-month', 'placeholder'=>'Mês', 'required'])}}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Html::decode(Form::label('expiration_year', 'Ano', array('class' => 'col-form-label'))) !!}
                                {{Form::text('expiration_year', '', ['id' => 'expiration_year', 'class'=>'form-control show-date-year', 'placeholder'=>'Ano', 'required'])}}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                {{Form::text('holder_name', '', ['id' => 'holder_name', 'class'=>'form-control', 'maxlength'=>'100', 'placeholder'=>'Nome do Portador', 'required'])}}
                            </div>
                        </div>

                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-info">Confirmar Pagamento</button>
                </div>

            <p class="text-danger text-center">
                Em caso de problemas com o pagamento fale com
                <br>
                <b>suporte@orights.com.br</b>
            </p>
            {{Form::close()}}
        </div>
    </div>
</div>