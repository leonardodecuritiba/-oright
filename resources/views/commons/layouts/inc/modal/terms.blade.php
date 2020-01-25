<div class="modal modal-left" id="showTerms" tabindex="-1" role="dialog" aria-labelledby="showTerms">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Termos de Uso Orights</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-right">
                    <img src="{{asset('assets/images/logos/logo-b-p.png')}}"
                         alt="logo icon">
                </div>
                @include('commons.terms-text')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
