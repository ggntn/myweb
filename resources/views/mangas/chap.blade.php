@extends('layouts.homelayout')



@section('content2')
    <br>

    {{--<body><h1>{{$ch}}</h1></body>--}}


    {{--{{$mangas}}--}}
    {{--<hr>--}}
    {{--{{$chapters}}--}}
    @if(count($chapters)>0)

        @foreach($chapters as $chapter)

            @if(($chapter->chap_name) == ($ch))
                @can('create/edit/delete-mangas/chap', Auth::user())
                {!! Form::open(['action' => ['ChapsController@destroy',$chapter->manga_chap_id],'method' => 'POST' ]) !!}

                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('delete this chapter',['class' => 'btn btn-sm btn-danger'])}}

                {!! Form::close() !!}
                @endcan
                {{$chapter->chap_id}}
                @foreach(json_decode($chapter->image, true) as $images)
                    <div class="align-content-xl-center">
                        <p style="text-align:center;">
                        <a href="{{ URL::to('storage/imageschap/'.$images)}}" >
                            <img src="{{ URL::to('storage/imageschap/'.$images)}}" class="center" >
                            {{--<div class="portfolio-box-caption">--}}
                                {{--<div class="portfolio-box-caption-content">--}}
                             {{--<span class="glyphicon glyphicon-zoom-in"--}}
                             {{--style="font-size: 80px"></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        </a>
                        </p>
                    </div>
                @endforeach

                {{--<a href="/chap/{{$chapter->chap_name}}/edit"  class="btn btn-sm btn-primary ">Edit Chapters</a>--}}
            {{--<div class="container-fluid">--}}
                {{--<div class="card mb-4 shadow-sm">--}}
                    {{----}}
                    {{--<img src="/storage/imageschap/{{$chapter->image}}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166bb93349f%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166bb93349f%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">--}}
                    {{--<div class="card-body">--}}
                        {{--<p class="card-text"> {{$chapter->chap_name}} </p>--}}
                        {{--<div class="d-flex justify-content-between align-items-center">--}}
                            {{--<div class="btn-group">--}}
                                {{--<a href="/manga/{{$manga->manga_id}}"{{$manga->manga_name}} class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Detail</a>--}}
                                {{--<a href="/edit/{{$manga->manga_id}}"{{$manga->manga_name}} class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Edit</a>--}}
                            {{--</div>--}}
                            {{--<small class="text-muted"></small>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            @endif

        {{--@endforeach--}}
    @endforeach
    @else
        <p>No post</p>

    @endif
    <footer>
        <a href="/manga"  class="btn btn-sm btn-outline-secondary">Back to Home</a>
    </footer>

@endsection

