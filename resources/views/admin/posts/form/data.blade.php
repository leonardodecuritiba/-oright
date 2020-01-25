<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Form row
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->

@if(isset($Data))
    <h4 class="card-title"><strong>#{{$Data->id}} - {{$Data->getShortName()}}</strong></h4>
@else
    <h4 class="card-title"><strong>Dados da Categoria do Blog</strong></h4>
@endif

<div class="card-body">


    <h6 class="text-uppercase mt-3">Dados da Publicação</h6>
    <hr class="hr-sm mb-2">

    @if(isset($Data))
        <div class="form-row">
            <label class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{$Data->id}}</p>
            </div>
        </div>
        <div class="form-row">
            <label class="col-sm-2 col-form-label">Data de Publicação</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{$Data->getPublishedAtFormatted()}}</p>
            </div>
        </div>
    @endif


    <h6 class="text-uppercase mt-3">Informações</h6>

    @if(isset($Data) && $Data->hasShortImage())

        <div class="form-row">

            <div class="col-md-3" data-provide="photoswipe">
                <a href="#">
                    <img style="max-height: 240px;" class="img-fluid" data-original-src="{{$Data->getShortImage()}}" src="{{$Data->getShortImage()}}">
                </a>
            </div>

            <div class="form-group col-md-9">
                {!! Html::decode(Form::label('short_image', 'Alterar Imagem <i class="fa fa-question-circle"
                    data-provide="tooltip"
                    data-placement="right"
                    data-tooltip-color="primary"
                    data-original-title="'.config('orights.posts.short_image.message').'"></i>', array('class' => 'col-form-label'))) !!}
                <input name="short_image" type="file" data-provide="dropify">
            </div>
        </div>
    @else

        <div class="form-row">
            <div class="form-group col-md-12">
                {!! Html::decode(Form::label('short_image', 'Imagem <i class="fa fa-question-circle"
                    data-provide="tooltip"
                    data-placement="right"
                    data-tooltip-color="primary"
                    data-original-title="'.config('orights.posts.short_image.message').'"></i>', array('class' => 'col-form-label'))) !!}
                <input name="short_image" type="file" data-provide="dropify" required>
            </div>
        </div>

    @endif

    <hr class="hr-sm mb-2">
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('category_id', 'Categoria *', array('class' => 'col-form-label'))) !!}
            {{Form::select('category_id', $Page->auxiliar['blog_categories'], old('category_id',(isset($Data) ? $Data->category_id : '')), ['placeholder' => 'Escolha a Categoria', 'class'=>'form-control show-tick','id' => 'categories', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('title', 'Título *', array('class' => 'col-form-label'))) !!}
            {{Form::text('title', old('title',(isset($Data) ? $Data->title : "")), ['id'=>'title','placeholder'=>'Título','class'=>'form-control','minlength'=>'3', 'maxlength'=>'100', 'required'])}}
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('short_content', 'Resumo *', array('class' => 'col-form-label'))) !!}
            <textarea name="short_content" data-provide="summernote" data-min-height="50">{{old('short_content',(isset($Data) ? $Data->short_content : ""))}}</textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            {!! Html::decode(Form::label('content', 'Conteúdo *', array('class' => 'col-form-label'))) !!}
            <textarea name="content" data-provide="summernote" data-min-height="150">{{old('content',(isset($Data) ? $Data->content : ""))}}</textarea>
        </div>
    </div>
</div>


<footer class="card-footer text-right">
    <button class="btn btn-primary" type="submit">Salvar</button>
</footer>