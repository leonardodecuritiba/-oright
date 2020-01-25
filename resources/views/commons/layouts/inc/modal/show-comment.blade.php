<div class="modal modal-top fade show" id="showComment" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Visualizar Comentário</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-right">
                    <img src="{{asset('assets/images/logos/logo-b-p.png')}}"
                         alt="logo icon">
                </div>
                <dl class="row">
                    <dt class="col-sm-3">ID</dt>
                    <dd class="col-sm-9" id="id"></dd>
                    <dt class="col-sm-3">Situação</dt>
                    <dd class="col-sm-9" id="active"></dd>
                    <dt class="col-sm-3">Cadastrado</dt>
                    <dd class="col-sm-9" id="created_at"></dd>
                    <dt class="col-sm-3">Usuário</dt>
                    <dd class="col-sm-9" id="user"></dd>
                    <dt class="col-sm-3">Comentário</dt>
                    <dd class="col-sm-9" id="content"></dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
