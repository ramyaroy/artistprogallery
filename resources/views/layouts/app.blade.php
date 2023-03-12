<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 
 
    <link rel="canonical" href="<?= url('/'); ?>" />
    <link rel="alternate" hreflang="x-default" href="<?= url('/'); ?>" />

    <!-- Styles --> 
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <!-- Font Awesome css-->
    <link  rel="stylesheet" href="{{ asset('css/web/fontawesome/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/web/styledefault.css') }}"/> 

    <link rel="shortcut icon" href="{{url('/images/favicon.ico')}}"/> 


    <meta name="msapplication-TileColor" content="#6399ec" />
    <meta name="msapplication-TileImage" content="{{ asset('images/ms-icon-144x144.png') }}" />
    <meta name="theme-color" content="#6399ec" />
    <!-- #### JavaScript files ###-->      
     <style type="text/css">
       .m-l-2{margin-left:2px!important}.no-padding{padding-bottom:0!important;margin-bottom:0!important;font-size:12px!important}.msg_err_pin{padding-bottom:0!important;margin-bottom:0!important}.msg_err_phone{padding-bottom:0!important;margin-bottom:0!important;}.msg_err_pass{padding-bottom:0!important;margin-bottom:0!important}.no_pad{padding:0}.terms_cond_mod{padding-bottom:22px}.terms_agree{float:right}.ArtistHome{margin-left:15px}
    </style>
</head>
<body>
    <div id="app">
        
        <div id="overlay" class='overlay'>
            <div class="sonar-wrapper">
                <div class="sonar-emitter">
                    <div class="sonar-wave"></div>
                </div>
            </div>
        </div>

        <nav id="navbar" class="navbar navbar-light fixed-top navbar-expand-lg yamm justify-content-between">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Navbar Brand -->                     
                    <a href="<?= url('/'); ?>" title="artistprogallery">
                        <img src="{{url('/images/logo-small.png')}}" alt="" title="" width="80" height="50" class="d-none d-md-inline-block">
                    </a>
                    <a href="<?= url('/'); ?>" title="artistprogallery">
                        <img src="{{url('/images/logo-small.png')}}" alt="" title="" width="60" height="40" class="d-md-none">
                    </a>
                    <span class="sr-only"></span>
                    <span class="btn btn-success d-lg-none nav_click background_transparent" data-toggle="collapse" data-target="#navigation"><i class="fa fa-arrow-down"></i></span>
                </div>
               
                 <div id="navigation" class="navbar-collapse collapse">
                    <div class="navbar-nav mr-auto">
                        <div class="nav-item  dropdown normal-dropdown">
                            <a href="<?= url(''); ?>" class="nav-link">Home</a>
                        </div>
                        
                        <div class="nav-item ">
                         </div>
                        <div class="nav-item ">
                             
                        </div>    
                    </div>
                    <!-- btn btn-outline-secondary mr-1 -->
                </div>
                <!-- /.nav-collapse Mobile Device and Tablet Ends-->
                <div class="home hide_nav row"> 

                    @guest
                    <div class="nav-item col-sm">
                        <a href="<?= url('register'); ?>" class="nav-link">Register</a>
                    </div>
                    <div class="nav-item col-sm">
                        <a href="<?= url('login'); ?>" class="nav-link">Login</a>
                    </div>
                    @endguest
                    @auth
                    <div class="nav-item col-sm">
                        <a href="<?= url('gallery'); ?>" class="nav-link">Gallery</a>
                    </div>

                    <div class="dropdown">
                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown">
                            {{Auth::user()->name}}
                        </button>
 
                        <div class="dropdown-menu">
                             <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('userprofile.index') }}">Manage Profile</a>
                            <a class="dropdown-item" href="<?=url('gallery')?>">Manage Photos</a>
                            <a class="dropdown-item" href="javascript:void" onclick="$('#logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>                    
                    @endauth  
                </div>                
            </div>
        </nav>
 
        
      
        @yield('content')


          
    </div> 
    
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"  ></script>
    <!-- <script src="{{ asset('js/web/jquery.min.js')}}"></script>
    <script src="{{ asset('js/web/bootstrap.min_minify.js')}}"></script> -->
 
    
  
 <script>
    /** Console Warnin **/
console.trace("%cSTOP!" +
    "%cDo not paste any scripts here. If anyone asks you to do it, don't listen .They want to steal your account information",
    "color: RED; font-size:70px;", "color:ASH;font-size:25px;");
/** Console Warning Ends **/
$(document).ready(function() {
    $("#overlay").hide(600).delay(800);  
    
    });  
    
    
    
    </script>

</body>
</html>
