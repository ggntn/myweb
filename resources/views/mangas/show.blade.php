@extends('layouts.homelayout')

@section('content2')
    <br>



    <div class="row">
    <h1>{{$mangas->manga_name}}</h1>
        <a href="/manga/{{$mangas->manga_id}}/edit"  class="btn btn-sm btn-primary ">Edit</a>

    {{--{!! Form::open(['action' => ['MangasController@destroy',$mangas->id],'method' => 'POST' ]) !!}--}}
        {{--{{Form::hidden('_method','DELETE')}}--}}
        {{--{{Form::submit('Delete',['class' => 'btn btn-sm btn-danger'])}}--}}
    {{--{!! Form::close() !!}--}}

    <br>
    </div>
    <div class="row">
        <div class="col-md-7">
            <a href="https://blackrockdigital.github.io/startbootstrap-1-col-portfolio/#">
                <img class="img-fluid rounded mb-3 mb-md-0" src="https://i.pinimg.com/originals/a9/bd/21/a9bd214803684dc18fb5b257e0ee695d.jpg" alt="">
            </a>
        </div>
        <div class="col-md-5">
            <h2>Synoposis</h2>
             <small></small>{{$details->detail_manga}}

            <hr>

            <h2>Category</h2>
            <small></small>{{$categories->category_name}}
        </div>

    </div>
    <hr>

    <div class="row">
        <div class="col-md-7">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{$mangas->manga_name}}/">  a</a>
        </div>

        <div class="col-md-7">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/...">Episode</a>
        </div>

        <div class="col-md-7">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/...">Episode</a>
        </div>

        {{--{{$chapters->chap_name}}--}}
    </div>
    <hr>
    <a href="/manga"  class="btn btn-sm btn-outline-secondary">Back to Home</a>
@endsection