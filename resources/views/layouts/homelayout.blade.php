

{{--<div class="masthead">--}}
    {{--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjjQhP-7XeJDQbHnEbNypPrN9XFJtvGpdN7_LRJ7asMoSLbwzS" width="850" height="100"  vspace="10" hspace="70">--}}
{{--</div>--}}
<head>
    {!! Html::style('css/select2.min.css') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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

        <a class="navbar-brand js-scroll-trigger" href="/manga">{{ trans('site.humble')}}</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" id="dropdownThemes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ trans('site.categories')}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownThemes">
                        {{--@yield('category')--}}
                        <a class="dropdown-item" href="/categories/Action">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            {{ trans('site.action')}}</a>

                        <a class="dropdown-item" href="/categories/Adventure">
                        <i class="fa fa-star" aria-hidden="true"></i>
                            {{ trans('site.adventure')}} </a>

                        <a class="dropdown-item" href="/categories/Sci-Fi">
                        <i class="fa fa-star" aria-hidden="true"></i>
                            {{ trans('site.scifi')}} </a>

                        <a class="dropdown-item" href="/categories/Horror">
                        <i class="fa fa-star" aria-hidden="true"></i>
                            {{ trans('site.horror')}} </a>

                        <a class="dropdown-item" href="/categories/Comady">
                        <i class="fa fa-star" aria-hidden="true"></i>
                            {{ trans('site.comady')}} </a>

                        <a class="dropdown-item" href="/categories/Romantic">
                        <i class="fa fa-star" aria-hidden="true"></i>
                            {{ trans('site.romantic')}} </a>

                        <a class="dropdown-item" href="/categories/Fantasy">
                        <i class="fa fa-star" aria-hidden="true"></i>
                            {{ trans('site.fantasy')}} </a>


                    </div>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/chap">{{ trans('site.viewallchap')}}</a>
                </li>



                @guest
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/login') }}">{{ trans('site.login')}}</a>
                </li>

                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('register') }}">{{ trans('site.register')}}</a>
                </li>

                @else




                    @can('admin', Auth::user())
                    <li class="nav-item dropdown">
                                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" id="dropdownThemes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ trans('site.create')}}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownThemes">
                                    <a class="dropdown-item" href="/create">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        {{ trans('site.createmanga')}}</a>

                                    <a class="dropdown-item" href="/create_chap">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        {{ trans('site.createchap')}}</a>

                                    <a class="dropdown-item" href="/tag">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        {{ trans('site.createtag')}}</a>
                                    <a class="dropdown-item" href="/author">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        {{ trans('site.createauthor')}}</a>
                                </div>
                     </li>
                    @endcan()



                    <li class="nav-item  dropdown">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle"href="#" id="dropdownThemes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if( (Auth::user()->role_id)==1)
                                {{ Auth::user()->name }} {{ trans('site.admin')}}

                            @else
                                {{ Auth::user()->name }} {{ trans('site.member')}}
                            @endif
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                               {{ trans('site.logout')}}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>




                @endguest
                <li>
                    @if(session()->has('locale'))
                        <a href="{{ url('lang/' . ((session()->get('locale')=='en')? 'th' : 'en')) }}"
                           class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"> {{ Str::upper((session()->get('locale')=='en')?'th':'en') }}
                        </a>
                    @else
                        <a href="{{ url('lang/th') }}" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"> TH </a>
                    @endif
                </li>
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

    @yield('content2')
    </div>
</main>
{!! Html::style('css/select2.min.js') !!}
<script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js') }}"></script>
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
