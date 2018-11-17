@extends('layouts.homelayout')



@section('content2')
    <br>
    <br>
    <h2>Edit Chapter</h2>
    @include('inc.message')
    {!! Form::open(['action' => 'ChapsController@update',$chapters->chap_id,'method' => 'POST']) !!}
    <div class="form-group">
        {!! Form::label('chap', 'Chapter id: ') !!}
        {!! Form::text('chap_id', $chapters->chap_id, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('chap_name', 'Chapter Name: ') !!}
        {!! Form::textarea('chap_name', $chapters->chap_name,
        ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image: ') !!}
        {!! Form::textarea('image', $chapters->image,
        ['class'=>'form-control']) !!}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}




@endsection