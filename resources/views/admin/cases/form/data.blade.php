<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Form row
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
@if(isset($Data))
    <h4 class="card-title"><strong>#{{$Data->id}} - {{$Data->getShortName()}}</strong></h4>
@else
    <h4 class="card-title"><strong>Dados do Case</strong></h4>
@endif

<div class="card-body">

    <h6 class="text-uppercase mt-3">Informações</h6>
    <hr class="hr-sm mb-2">
    {{--Cover--}}
    @if(isset($Data) && $Data->hasCover())

        <div class="form-row">

            <div class="col-md-3" data-provide="photoswipe">
                <a href="#">
                    <img style="max-height: 240px;" class="img-fluid" data-original-src="{{$Data->getLinkDownload()}}" src="{{$Data->getLinkDownload()}}">
                </a>
            </div>

            <div class="form-group col-md-9">
                {!! Html::decode(Form::label('cover', 'Alterar Imagem <i class="fa fa-question-circle"
                    data-provide="tooltip"
                    data-placement="right"
                    data-tooltip-color="primary"
                    data-original-title="Extensões permitidas: jpeg, png, bmp, gif, ou svg"></i>', array('class' => 'col-form-label'))) !!}
                <input name="cover" type="file" data-provide="dropify">
            </div>
        </div>
    @else

        <div class="form-row">
            <div class="form-group col-md-12">
                {!! Html::decode(Form::label('cover', 'Imagem <i class="fa fa-question-circle"
                    data-provide="tooltip"
                    data-placement="right"
                    data-tooltip-color="primary"
                    data-original-title="Extensões permitidas: jpeg, png, bmp, gif, ou svg"></i>', array('class' => 'col-form-label'))) !!}
                <input name="cover" type="file" data-provide="dropify" required>
            </div>
        </div>

    @endif

    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('name', 'Nome *', array('class' => 'col-form-label'))) !!}
            {{Form::text('name', old('name',(isset($Data) ? $Data->title : "")), ['id'=>'title','placeholder'=>'Nome','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('function', 'Cargo/Formação *', array('class' => 'col-form-label'))) !!}
            {{Form::text('function', old('function',(isset($Data) ? $Data->title : "")), ['id'=>'title','placeholder'=>'Cargo/Formação','class'=>'form-control','minlength'=>'3', 'maxlength'=>'50', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('content', 'Conteúdo *', array('class' => 'col-form-label'))) !!}
            {{Form::textarea('content', old('content',(isset($Data) ? $Data->content : "")), ['id'=>'title','placeholder'=>'Conteúdo','class'=>'form-control','minlength'=>'3', 'maxlength'=>'500', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
</div>


<footer class="card-footer text-right">
    <button class="btn btn-primary" type="submit">Salvar</button>
</footer>