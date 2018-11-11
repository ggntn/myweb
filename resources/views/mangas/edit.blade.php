@extends('layouts.homelayout')

@section('content2')
    <br>
    <br>
    <h2>Edit Manga</h2>
    @include('inc.message')
    {!! Form::open(['action' => ['MangasController@update',$mangas->manga_id],'method' => 'POST']) !!}
    <div class="form-group">
        {!! Form::label('manga_name', 'Manga name: ') !!}
        {!! Form::text('manga_name',$mangas->manga_name, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Category id: ') !!}
        {!! Form::text('category_id',$mangas->category_id, ['class'=>'form-control']) !!}
    </div>
    {{--<div class="form-group">--}}
    {{--{!! Form::label('category', 'Category name: ') !!}--}}
    {{--{!! Form::text('category', null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    <div class="form-group">
        {!! Form::label('title', 'Title A-Z id: ') !!}
        {!! Form::text('title_id',$mangas->title_id, ['class'=>'form-control']) !!}
        {{--<div class="form-group">--}}
        {{--{!! Form::label('title', 'Title A-Z : ') !!}--}}
        {{--{!! Form::text('title', null, ['class'=>'form-control']) !!}--}}
        {{--</div>--}}
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
        {!! Form::label('detail', 'Detail id: ') !!}
        {!! Form::text('detail_id',$mangas->detail_id, ['class'=>'form-control']) !!}
    </div>
    {{--<div class="form-group">--}}
    {{--{!! Form::label('detail', 'Detail : ') !!}--}}
    {{--{!! Form::text('detail', null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    <div class="form-group">
        {!! Form::label('chap', 'Chapter id: ') !!}
        {!! Form::text('chap_id', $mangas->chap_id, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image: ') !!}
        {!! Form::textarea('image',$mangas->image,
        ['class'=>'form-control']) !!}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection