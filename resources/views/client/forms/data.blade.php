<h2 class="card-inside-title">Dados de Acesso</h2>

<div class="form-group">
    <label for="id" class="col-md-4 control-label">ID</label>
    <div class="col-md-6">
        <input id="id" type="id" class="form-control" name="id"
               value="{{ $Data->id }}" disabled>
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
    <div class="col-md-4">
        <input id="email" type="email" class="form-control" name="email"
               value="{{ old('email',$Data->getShortEmail()) }}" disabled>
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-default btn-block" data-toggle="modal"
                data-target="#changePassword">
            Alterar Senha
        </button>
    </div>
</div>

<hr>

<h2 class="card-inside-title">Dados do Perfil</h2>

<div class="form-group">
    <label for="type" class="col-md-4 control-label">Tipo</label>

    <div class="col-md-6">
        <input name="type" type="radio" class="with-gap" value="0" id="pf"/>
        <label for="pf">Pessoa Física</label>
        <input name="type" type="radio" class="with-gap" value="1"
               @if(!isset($Data)) checked @endif id="pj"/>
        <label for="pj">Pessoa Jurídica</label>
    </div>
</div>

@include('clients.forms.pf')
@include('clients.forms.pj')
<hr>
@include('commons.form.address')
<hr>
@include('commons.form.contact')


<div class="form-group">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success pull-right">
            Salvar
        </button>
    </div>
</div>