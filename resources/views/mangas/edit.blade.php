@extends('layouts.homelayout')



@section('content2')
    <br>
    <br>
    <h2>Edit Manga</h2>
    @include('inc.message')
    {!! Form::open(['action' => ['MangasController@update',$mangas->manga_id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('manga_name', 'Manga name: ') !!}
        {!! Form::text('manga_name',$mangas->manga_name, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Category id: ') !!}
        {!! Form::text('category_id',$mangas->category_id, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('author', 'Author id: ') !!}
        {!! Form::text('author_id',$mangas->author_id, ['class'=>'form-control']) !!}
    </div>
    {{--<div class="form-group">--}}
    {{--{!! Form::label('author', 'Author : ') !!}--}}
    {{--{!! Form::text('author', null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    <div class="form-group">
        {!! Form::label('chap', 'Chapter id: ') !!}
        {!! Form::text('chap_id', $mangas->chap_id, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('detail', 'Detail: ') !!}
        {!! Form::textarea('detail', $mangas->detail,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image: ') !!}
        {!! Form::file('image', null,
        ['class'=>'form-control']) !!}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::hidden('old_image',$mangas->image)}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection