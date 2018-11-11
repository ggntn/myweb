@extends('layouts.homelayout')

@section('content2')
    <br>
    <br>
    <h2>Create Manga</h2>
    @include('inc.message')
    {!! Form::open(['action' => 'MangasController@store','method' => 'POST']) !!}
    <div class="form-group">
        {!! Form::label('manga_name', 'Manga name: ') !!}
        {!! Form::text('manga_name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Category id: ') !!}
        {!! Form::text('category_id', null, ['class'=>'form-control']) !!}
    </div>
    {{--<div class="form-group">--}}
        {{--{!! Form::label('category', 'Category name: ') !!}--}}
        {{--{!! Form::text('category', null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    <div class="form-group">
        {!! Form::label('title', 'Title A-Z id: ') !!}
        {!! Form::text('title_id', null, ['class'=>'form-control']) !!}
        {{--<div class="form-group">--}}
            {{--{!! Form::label('title', 'Title A-Z : ') !!}--}}
            {{--{!! Form::text('title', null, ['class'=>'form-control']) !!}--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        {!! Form::label('author', 'Author id: ') !!}
        {!! Form::text('author_id', null, ['class'=>'form-control']) !!}
    </div>
    {{--<div class="form-group">--}}
        {{--{!! Form::label('author', 'Author : ') !!}--}}
        {{--{!! Form::text('author', null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    <div class="form-group">
        {!! Form::label('detail', 'Detail id: ') !!}
        {!! Form::text('detail_id', null, ['class'=>'form-control']) !!}
    </div>
    {{--<div class="form-group">--}}
        {{--{!! Form::label('detail', 'Detail : ') !!}--}}
        {{--{!! Form::text('detail', null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    <div class="form-group">
        {!! Form::label('chap', 'Chapter id: ') !!}
        {!! Form::text('chap_id', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image: ') !!}
        {!! Form::textarea('image', null,
        ['class'=>'form-control']) !!}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}
    {{--<form action="{{ url('/detail') }}" method="POST">--}}
        {{--{{ csrf_field() }}--}}
        {{--<div class="form-group">--}}
            {{--<label>Manga chapter/ Manga: </label>--}}
            {{--<input type="text" class="form-control" name="title">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label>Image: </label>--}}
            {{--<textarea class="form-control" name="body" cols="50" rows="10"></textarea>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<input type="submit" class="btn btn-primary form-control" value="Add new chap/Manga">--}}
        {{--</div>--}}
    {{--</form>--}}
@endsection