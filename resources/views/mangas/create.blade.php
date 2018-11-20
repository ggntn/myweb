@extends('layouts.homelayout')



@section('content2')
    <br>
    <br>
    <h2>Create Manga</h2>
    @include('inc.message')
    {!! Form::open(['action' => 'MangasController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('manga_name', 'Manga name: ') !!}
        {!! Form::text('manga_name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Category id: ') !!}
        {!! Form::text('category_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('author', 'Author id: ') !!}
        {!! Form::text('author_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('chapter', 'Chapter id: ') !!}
        {!! Form::text('chap_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('detail', 'Detail: ') !!}
        {!! Form::textarea('detail', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Image: ') !!}
        {!! Form::file('image', null,
        ['class'=>'form-control']) !!}
    </div>

    {{--<div class="form-group">--}}
        {{--<label class="col-sm-3 control-label">--}}
           {{--Test pic--}}
        {{--</label>--}}
        {{--<div class="col-sm-9">--}}
                            {{--<span class="btn btn-default btn-file">--}}
                                {{--<input id="input-2" name="input2[]" type="file" class="file" multiple data-show-upload="true" data-show-caption="true">--}}
                            {{--</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<form action="'upload" id="upload" enctype="multipartform-data">--}}
        {{--<input type="file" name="file[]" multiple><br>--}}

    {{--</form>--}}
    {{--<script>--}}
        {{--var form = document.getElementById('upload');--}}
        {{--var request = new XMLHttpRequest();--}}
        {{--form.addEventListener('Submit',function(e){--}}
            {{--e.preventDefault();--}}
            {{--var formdata = new FormData(form);--}}
            {{--request.open('post','/upload');--}}
            {{--request.addEventListener("load",transferComplete);--}}
            {{--request.send(formdata);--}}
        {{--});--}}
        {{--function transferComplete(data){--}}
            {{--console.log(data.currentTarget.response);--}}
        {{--}--}}
    {{--</script>--}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}


    {!! Form::close() !!}

@endsection