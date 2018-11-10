@extends('layouts.homelayout')

@section('content2')
    <br>
    <h1>{{$mangas->manga_name}}</h1>

    <div class="row">
        <div class="col-md-7">
            <a href="https://blackrockdigital.github.io/startbootstrap-1-col-portfolio/#">
                <img class="img-fluid rounded mb-3 mb-md-0" src="https://i.pinimg.com/originals/a9/bd/21/a9bd214803684dc18fb5b257e0ee695d.jpg" alt="">
            </a>
        </div>
        <div class="col-md-5">
            <h2>Synoposis</h2>
             <small></small>{{$details->detail_manga}}

        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-7">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="manga/{{$mangas->manga_name}}/{{$chapters->chap_name}}"> {{$chapters->chap_name}} </a>
        </div>

        <div class="col-md-7">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/...">Episode</a>
        </div>

        <div class="col-md-7">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/...">Episode</a>
        </div>


@endsection