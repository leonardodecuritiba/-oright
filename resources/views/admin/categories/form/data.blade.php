<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Form row
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
@if(isset($Data))
    <h4 class="card-title"><strong>#{{$Data->id}} - {{$Data->getShortName()}}</strong></h4>
@else
    <h4 class="card-title"><strong>Dados da Categoria</strong></h4>
@endif

<div class="card-body">

    <h6 class="text-uppercase mt-3">Informações</h6>
    <hr class="hr-sm mb-2">
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('title', 'Título *', array('class' => 'col-form-label'))) !!}
            {{Form::text('title', old('title',(isset($Data) ? $Data->title : "")), ['id'=>'title','placeholder'=>'Título','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('descriptions', 'Descrições *', array('class' => 'col-form-label'))) !!}
            {{Form::textarea('descriptions', old('descriptions',(isset($Data) ? $Data->descriptions : "")), ['id'=>'title','placeholder'=>'Descrições','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
</div>


<footer class="card-footer text-right">
    <button class="btn btn-primary" type="submit">Salvar</button>
</footer>