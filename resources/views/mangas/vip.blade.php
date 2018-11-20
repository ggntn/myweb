@extends('layouts.homelayout')
@section('content2')
    <br>
    <br>
    <h2>Vip</h2>
    @include('inc.message')
    {{--{{$users}}--}}
    @foreach( $users as $user)

        @if( (Auth::user()->username) == $user->username )
            <h5>
                this is {{Auth::user()->username}}
            </h5>

            {!! Form::open(['action' => ['VipController@update',$user->id],'method' => 'POST']) !!}
            <div class="form-group">
                <input checked="checked" name="my_checkbox" type="checkbox" value="1">
                {!! Form::label('money', 'Money : ') !!}
                {!! Form::text('money', null, ['class'=>'form-control']) !!}
            </div>

            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {{Form::hidden('_method','PUT')}}
            {!! Form::close() !!}
        @endif
    @endforeach
    {{--{!! Form::open(['action' => 'VipController@edit','method' => 'POST']) !!}--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::radio('money_check', 'value')!!}--}}
        {{--{!! Form::label('money', 'Money : ') !!}--}}
        {{--{!! Form::text('money', null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}


    {{--{{Form::submit('Submit',['class'=>'btn btn-primary'])}}--}}
    {{--{{Form::hidden('_method','PUT')}}--}}
    {{--{!! Form::close() !!}--}}
@endsection