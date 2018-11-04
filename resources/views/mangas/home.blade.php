@extends('layouts.homelayout')


{{--test--}}
@section('content')
    <head>
        <strong>this is home page for manga web</strong>
    </head>
@endsection

{{--test--}}
@section('Manga')
    @parent
    <p>onepiece</p>
@endsection