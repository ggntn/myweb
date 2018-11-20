

{{--<div class="masthead">--}}
    {{--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjjQhP-7XeJDQbHnEbNypPrN9XFJtvGpdN7_LRJ7asMoSLbwzS" width="850" height="100"  vspace="10" hspace="70">--}}
{{--</div>--}}
<head>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/magnific-popup/magnific-popup.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/freelancer.min.css') }}">

</head>
<body>


<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav"  >
    <div class="container" >

        <a class="navbar-brand js-scroll-trigger" href="/manga">Humble Manga</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" id="dropdownThemes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cataegories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownThemes">
                        {{--@yield('category')--}}
                        <a class="dropdown-item" href="/categories/Action">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            Action </a>

                        <a class="dropdown-item" href="/categories/Adventure">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        Adventure </a>

                        <a class="dropdown-item" href="/categories/Sci-Fi">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        Sci-Fi </a>

                        <a class="dropdown-item" href="/categories/Horror">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        Horror </a>

                        <a class="dropdown-item" href="/categories/Comady">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        Comady </a>

                        <a class="dropdown-item" href="/categories/Romantic">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        Romantic </a>

                        <a class="dropdown-item" href="/categories/Fantasy">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        Fantasy </a>


                    </div>
                </li>

                @guest
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/login') }}">Login</a>
                </li>

                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('register') }}">Register</a>
                </li>

                @else



                    @can('create/edit/delete-mangas/chap', Auth::user())
                    <li class="nav-item dropdown">
                                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" id="dropdownThemes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownThemes">
                                    <a class="dropdown-item" href="/create">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        Create Manga </a>

                                    <a class="dropdown-item" href="/create_chap">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        Create Chapter Manga </a>
                                </div>
                     </li>
                    @endcan()



                    <li class="nav-item  dropdown">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle"href="#" id="dropdownThemes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if( (Auth::user()->role_id)==1)
                                {{ Auth::user()->name }} AS {{'admin'}}

                            @else
                                {{ Auth::user()->name }} AS {{'member'}}
                            @endif
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>




                @endguest
                {{--<li class="form-inline  mx-0 mx-lg-1">--}}
                    {{--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
                    {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
                {{--</li>--}}

            </ul>


        </div>

    </div>
</nav>
<br/>
<br/>
<br/>
<br/>
</body>






<main role="main">
    <div class="container">
<br>
        <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                       placeholder="Search Manga"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
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
                                    <a href="/edit/{{$manga->manga_id}}"{{$manga->manga_name}} class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Edit</a>
                                </div>
                                <small class="text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        @endif
    @yield('content2')
    </div>
</main>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script type="text/javascript" src="{{ URL::asset('https://code.jquery.com/jquery-3.1.1.slim.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js') }}"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin JavaScript -->

<script type="text/javascript" src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

<!-- Contact Form JavaScript -->
<script type="text/javascript" src="{{ URL::asset('js/jqBootstrapValidation.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/contact_me.js') }}"></script>

<!-- Custom scripts for this template -->
<script type="text/javascript" src="{{ URL::asset('js/freelancer.min.js') }}"></script>
