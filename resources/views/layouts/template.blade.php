<!doctype html>
<html>
    <head>

        <meta charset="utf-8">
        <title> this is from template   @yield('side_title')</title>
        {{--{!! Html::style('public/bootstrap/css/bootstrap.min.css') !!}--}}

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
    </head>

    <body>
        @yield('content')


        @section('Manga')


            <div class="Manga">

                <h1>Manga latest update</h1>
                this is the manga

                @show
            </div>
            {{--{!! Html::script('jquery/jquery.min.js') !!}--}}
            {{--{!! Html::script('bootstrap/js/bootstrap.min.js') !!}--}}

            <script type="text/javascript" src="{{ URL::asset('jquery/jquery.min.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('fontawesome-free-5.0.6/svg-with-js/js/fontawesome-all.js') }}"></script>
    </body>

</html>

