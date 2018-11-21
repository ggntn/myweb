@extends('layouts.homelayout')

@section('content2')
@include('inc.message')

            {!! Form::open(['action' => 'TagController@store','method' => 'POST'])!!}
            <h2>Create New Tag</h2>
                {!! Form::label('name', 'Tag name: ') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                <br>
                {{ Form::submit('create new tag',['class'=>'btn btn-primary']) }}
             {!! Form::close() !!}


@endsection
