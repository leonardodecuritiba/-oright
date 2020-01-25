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

                <h4 class="card-inside-title">Efetuar Pagamento</h4>


                <section class="payment text-center">

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