@extends('layouts.homelayout')

@section('content2')
    <br>
    {{--<h1>Home</h1>--}}
    @include('inc.message')
    {{--{{$mangas->links()}}--}}
    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                   placeholder="  {{ trans('site.searchm')}}"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default border-radius: 50%">
                  {{ trans('site.search')}}
            </button>
        </span>
        </div>
    </form>


    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
    @if(count($mangas)>0)

        @foreach($mangas as $manga)

                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">

                                <img src="/storage/images/{{$manga->image}}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166bb93349f%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166bb93349f%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                                <div class="card-body">
                                    <b class="card-text"> Manga Name : {{$manga->manga_name}}
                                        @unless($manga->tags->isEmpty())
                                            <div>
                                                Tags :
                                                @foreach($manga->tags as $tag)
                                                    <span class="badge badge-info"> {{ $tag->name }} </span>
                                                    &nbsp
                                                @endforeach
                                            </div>
                                        @endunless</b>
                                    <br>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="/manga/{{$manga->id}}"{{$manga->manga_name}} class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Detail</a>
                                            {{--<a href="/edit/{{$manga->manga_id}}"{{$manga->manga_name}} class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Edit</a>--}}
                                        </div>
                                        <small class="text-muted"></small>
                                        {{--@unless($manga->tags->isEmpty())--}}
                                            {{--<div>--}}
                                                {{--@foreach($manga->tags as $tag)--}}
                                                    {{--<span class="label label-default"> {{ $tag->name }} </span>--}}
                                                    {{--&nbsp--}}
                                                {{--@endforeach--}}
                                            {{--</div>--}}
                                        {{--@endunless--}}
                                    </div>
                                </div>
                            </div>
                        </div>

         @endforeach

    @else
                    <h5><strong>No post</strong></h5>
    @endif

            </div>
        </div>
        {{--<footer>--}}
            {{--{{$mangas->links()}}--}}
        {{--</footer>--}}
    </div>

@endsection
<footer>
    {{$mangas->links()}}
</footer>
