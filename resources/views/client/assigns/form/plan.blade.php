<div class="card-body">
    <h6 class="text-uppercase mt-3">Dados do Plano (<i>#{{$Data->code}}</i>)</h6>

    <div class="form-row">
        <label class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-6">
            <p class="form-control-plaintext">{{$Data->name}}</p>
        </div>
    </div>

    <div class="form-row">
        <label class="col-sm-2 col-form-label">Descrição</label>
        <div class="col-sm-6">
            <p class="form-control-plaintext">{{$Data->description}}</p>
        </div>
    </div>

    <div class="form-row">
        <label class="col-sm-2 col-form-label">Valor</label>
        <div class="col-sm-10">
            <p class="form-control-plaintext">{{$Data->amount}}</p>
        </div>
    </div>

    <div class="form-row">
        <label class="col-sm-2 col-form-label">Número de Registros</label>
        <div class="col-sm-10">
            <p class="form-control-plaintext">{{$Data->registers}}</p>
        </div>
    </div>

    <div class="form-row">
        <label class="col-sm-2 col-form-label">Duração</label>
        <div class="col-sm-10">
            <p class="form-control-plaintext">{{$Data->getIntervalText()}}</p>
        </div>
    </div>
    <div class="form-row">
        <label class="col-sm-2 col-form-label">Período de Teste</label>
        <div class="col-sm-10">
            <p class="form-control-plaintext">{{$Data->getTrialText()}}</p>
        </div>
    </div>

    <hr>

    @include('commons.form.clients.billing')
</div>


<footer class="card-footer text-right">
    <a class="btn btn-default" href="{{route('assigns.create')}}">Escolher outro plano</a>
    <button class="btn btn-danger" type="button">Alterar Cartão</button>
    <button class="btn btn-info" type="submit">Confirmar</button>
</footer>
