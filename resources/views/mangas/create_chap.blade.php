@extends('layouts.homelayout')



@section('content2')
    <br>
    <h2>Create Chapter</h2>
    @include('inc.message')
    {!! Form::open(['action' => 'ChapsController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('chap', 'Chapter id: ') !!}
        {!! Form::text('chapter_id', null, ['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('chap_name', 'Chapter Name: ') !!}
        {!! Form::textarea('chap_name', null,
        ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('images', 'Image Chapter: ') !!}
        {!! Form::file('image[]',['multiple']) !!}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}




@endsection