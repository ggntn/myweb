@extends('layouts.homelayout')

@section('content2')
    <br>
    <br>

    {{--{!! Form::open(['action'=>'MangaController@store','method' => 'POST']) !!}--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('title', 'Title: ') !!}--}}
        {{--{!! Form::text('title', null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('body', 'Body: ') !!}--}}
        {{--{!! Form::textarea('body', null,--}}
        {{--['class'=>'form-control']) !!}--}}
    {{--</div>--}}

    {!! Form::close() !!}
    <form action="{{ url('/detail') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Manga chapter/ Manga: </label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label>Image: </label>
            <textarea class="form-control" name="body" cols="50" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary form-control" value="Add new chap/Manga">
        </div>
    </form>
@endsection