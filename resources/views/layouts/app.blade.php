<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   

    <title>Rental MAnagement SyS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('LogReg/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('LogReg/js/main.js')}}"></script>
    <script src="{{ asset('Nav/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('Nav/js/popper.min.js')}}"></script>
    <script src="{{ asset('Nav/js/bootstrap.min.js')}}" ></script>
    <script src="{{ asset('Nav/js/jquery.sticky.js')}}" ></script>
    <script src="{{ asset('Nav/js/main.js')}}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('LogReg/fonts/material-icon/css/material-design-iconic-font.min.css')}}"> 
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('LogReg/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('Nav/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('Nav/css/owl.carousel.min.css')}}">
    <link rel="stylesheet"  href="{{ asset('Nav/css/style.css')}}">
  
  
    



</head>


<body >

<div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar js-sticky-header site-navbar-target bg-white" role="banner">

        <div class="app container">
          <div class="row align-items-center position-relative">

            <div class="col-lg-4">
              <nav class="site-navigation text-right ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  
                
                  <li><a href="{{url('book')}}" class="nav-link">Books</a></li>
                  <li><a href="{{url('genre')}}"  class="nav-link">Genres</a></li>
                
                  <li><a href="{{url('rental')}}"  class="nav-link ">Borrows</a></li>
                  
                </ul>
              </nav>
            </div>
            <div class="col-lg-3 text-center">
              <div class="site-logo">
              @guest
                            @if (Route::has('login') || Route::has('register'))
                <a href="{{ url('/') }}">BOOKS Rental</a>
                  @endif

                            @else
                            <a href="{{ url('/home') }}">BOOKS Rental</a>
                            @endguest
              </div>


              <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3 text-black"></span></a></div>
            </div>
            <div class="col-lg-5">
              <nav class="site-navigation text-left mr-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                 
                  @guest
                            @if (Route::has('login'))
                                <li><a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a></li>
                               
                            @endif

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a></li>
                                <li class="active"><a href="/home" class="nav-link">Home</a></li>
                            @endif

                            @else
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li><a href="{{url('profile')}}" class="nav-link">Profile</a></li>
                            @if(!Auth::user()->is_librarian)
                            <li><a href="{{url('borrow')}}"  class="nav-link">My Rental</a></li>
                            @else
                            <li class="active"><a href="/home" class="nav-link">Home</a></li>

                            @endif
                            
                        @endguest
                        
                </ul>
              </nav>
            </div>
            

          </div>
        </div>

      </header>

      <main class="py-4">
      @include('layouts/flash')
            @yield('content')
        </main>
   

    
</body>
</html>
