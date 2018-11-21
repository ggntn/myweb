@extends('layouts.homelayout')

@section('content2')
@include('inc.message')

            {!! Form::open(['action' => 'AuthorController@store','method' => 'POST'])!!}
            <h2>Create New Author</h2>
                {!! Form::label('name', 'Author name: ') !!}
                {!! Form::text('author_name', null, ['class'=>'form-control']) !!}
                <br>
                {{ Form::submit('create new author',['class'=>'btn btn-primary']) }}
             {!! Form::close() !!}


@endsection
