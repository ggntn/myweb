@extends('layouts.homelayout')

@section('content2')
<h1>Tags</h1>
{{$tags}}
@include('inc.message')
    @foreach($tags as $tag)
    <th>{{$tag->id}} </th>
        <td>{{$tag->name}} </td>
    @endforeach

    <div class="col-md-3">
        <div class="well">

            {!! Form::open(['action' => 'TagController@store','method' => 'POST'])!!}
            <h2>new tag</h2>
                {!! Form::label('name', 'Tag name: ') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                {{ Form::submit('create new tag',['class'=>'btn btn-primary']) }}
             {!! Form::close() !!}

        </div>
    </div>
@endsection
