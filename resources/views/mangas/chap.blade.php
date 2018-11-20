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

            @endif


    @endforeach
    @else
        <p>No post</p>

    @endif
    <footer>
        <a href="/manga"  class="btn btn-sm btn-outline-secondary">Back to Home</a>
    </footer>

@endsection

