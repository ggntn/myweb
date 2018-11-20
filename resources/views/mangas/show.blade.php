@extends('layouts.homelayout')


@section('content2')
    <br>



    <div class="row">

    <h1>{{$mangas->manga_name}}</h1>
        @can('create/edit/delete-mangas/chap', Auth::user())
        {!! Form::open(['action' => ['MangasController@destroy',$mangas->manga_id],'method' => 'POST' ]) !!}
        <a href="/create_chap"  class="btn btn-sm btn-success ">Create Chapter</a>
        <a href="/manga/{{$mangas->manga_id}}/edit"  class="btn btn-sm btn-primary ">Edit Manga</a>

        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete Manga',['class' => 'btn btn-sm btn-danger'])}}

        {!! Form::close() !!}
        @endcan
    <br>
    </div>
    <div class="row">
        <div class="col-md-7">
                <img class="img-fluid rounded mb-3 mb-md-0" src="/storage/images/{{$mangas->image}}" alt="">
            </a>
        </div>
        <div class="col-md-5">
            <h2>Synoposis</h2>
             <small></small>{{$mangas->detail}}

            <hr>

            <h2>Category</h2>
            @foreach($categories as $cate)
                @if(($cate->category_id) == ($mangas->category_id))
                    <small>{{$cate->category_name}}</small>
                @endif
            @endforeach
        </div>

    </div>
    <hr>

    <div class="row">

        @foreach($chapters as $chapter)
            {{--@if(($mangas->manga_id) == 1)--}}
            @if(($chapter->chap_id) == ($mangas->chap_id))
                <div class="col-md-7">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/chap/{{$chapter->chap_name}}">{{$chapter->chap_name}}</a>
                    {{--<b>{{$mangas->manga_name}}</b>--}}

                </div>
            @endif
            {{--@endif--}}

        @endforeach
    </div>
    {{--</div>--}}

    {{--{{-test--}}
    {{--<div class="row">--}}
        {{--{{$chapters}}--}}
        {{--@foreach($mangas as $manga)--}}
            {{--@if(($mangas->manga_id) == 1)--}}

            {{--<div class="col-md-7">--}}
                {{--{{$mangas->manga_name}}--}}
                {{--<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/chap">{{$mangas->manga_name}} {{$mangas->chap_id}}</a>--}}
                {{--<b>{{$mangas->manga_name}}</b>--}}
            {{--</div>--}}
            {{--@endif--}}
        {{--@endforeach--}}

    {{--</div>--}}

        {{--<div class="col-md-7">--}}
            {{--<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/...">Episode</a>--}}
        {{--</div>--}}

        {{--<div class="col-md-7">--}}
            {{--<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/...">Episode</a>--}}
        {{--</div>--}}

        {{--{{$chapters->chap_name}}--}}
            <hr>
            <footer>
                {{$chapters->links()}}
                <a href="/manga"  class="btn btn-sm btn-outline-secondary">Back to Home</a>
            </footer>

@endsection
