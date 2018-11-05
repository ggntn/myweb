@extends('layouts.homelayout')


{{--test--}}
@section('content')

    <li class="nav-item mx-0 mx-lg-1">
        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/page">create</a>
    </li>
@endsection

{{--test--}}
@section('Manga')
    @parent
    <p>onepiece</p>
@endsection