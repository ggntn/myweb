<head>


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav"  >
    <div class="container" >

        <a class="navbar-brand js-scroll-trigger" href="/manga">Humble Manga</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" id="dropdownThemes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cataegories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownThemes">
                        <a class="dropdown-item" href="/categories/action">
                            <i class="fal fa-star fa-fw"></i>
                            Action </a>

                        <a class="dropdown-item" href="/categories/Adventure">
                            <i class="fal fa-star fa-fw"></i>
                            Adventure </a>

                        <a class="dropdown-item" href="/categories/Sci-Fi">
                            <i class="fal fa-star fa-fw"></i>
                            Sci-Fi </a>

                        <a class="dropdown-item" href="/categories/Horror">
                            <i class="fal fa-star fa-fw"></i>
                            Horror </a>

                        <a class="dropdown-item" href="/categories/Comedy">
                            <i class="fal fa-star fa-fw"></i>
                            Comedy </a>

                        <a class="dropdown-item" href="/categories/Romantic">
                            <i class="fal fa-star fa-fw"></i>
                            Romantic </a>

                        <a class="dropdown-item" href="/categories/Fantasy">
                            <i class="fal fa-star fa-fw"></i>
                            Fantasy </a>
                    </div>


                    {{--<div class="dropdown-menu" aria-labelledby="dropdownThemes">--}}
                    {{--<a class="dropdown-item" href="/template-categories/all">--}}
                    {{--<i class="fal fa-browser fa-fw"></i>--}}
                    {{--All Templates &amp; Themes</a>--}}
                    {{--<a class="dropdown-item" href="/template-categories/popular">--}}
                    {{--<i class="fal fa-star fa-fw"></i>--}}
                    {{--Most Popular</a>--}}
                    {{--<a class="dropdown-item" href="/buy-bootstrap-templates">--}}
                    {{--<i class="fal fa-shopping-basket fa-fw"></i>--}}
                    {{--Buy Bootstrap Templates</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<h6 class="dropdown-header">Template &amp; Theme Categories:</h6>--}}
                    {{--<a class="dropdown-item" href="/template-categories/admin-dashboard">Admin and Dashboard</a>--}}
                    {{--<a class="dropdown-item" href="/template-categories/full-websites">Full Websites</a>--}}
                    {{--<a class="dropdown-item" href="/template-categories/landing-pages">Landing Pages</a>--}}
                    {{--<a class="dropdown-item" href="/template-categories/one-page">One Page Websites</a>--}}
                    {{--<a class="dropdown-item" href="/template-categories/portfolios">Portfolios</a>--}}
                    {{--<a class="dropdown-item" href="/template-categories/blogs">Blogs</a>--}}
                    {{--<a class="dropdown-item" href="/template-categories/ecommerce">Ecommerce</a>--}}
                    {{--<a class="dropdown-item" href="/template-categories/unstyled">Unstyled Starter Templates</a>--}}
                    {{--<a class="dropdown-item" href="/template-categories/navigation-menus">Navigation and Navbars</a>--}}
                    {{--</div>--}}

                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle" href="#" id="dropdownThemes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownThemes">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Manga/Author">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </div>



                @guest
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/login">Login</a>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/register">Register</a>
                    </li>

                @else


                    @yield('content')

                    <li class="nav-item  dropdown">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle"href="#" id="dropdownThemes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
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
            </ul>


        </div>

    </div>
</nav>
<br/>
<br/>
<br/>
<br/>
</body>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="js/freelancer.min.js"></script>
