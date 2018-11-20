@extends('layouts.homelayout')


@section('content2')
    <br>


    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                   placeholder="Search Manga"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default border-radius: 50%">
                Search
            </button>
        </span>
        </div>
    </form>
    @if(isset($details))
        <h1>search <b>{{$query}}</b> are :</h1>
        <tbody>
        @foreach($details as $mangas)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">

                    <img src="/storage/images/{{$mangas->image}}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166bb93349f%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166bb93349f%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                    <div class="card-body">
                        <b class="card-text"> {{$mangas->manga_name}} </b>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="/manga/{{$mangas->manga_id}}"{{$mangas->manga_name}} class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Detail</a>

                            </div>
                            <small class="text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    @endif
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
