<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Bil Wifi" content="{{ config('app.name') }} by KinDev">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('favicon.ico') }}>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty ($title) ? $title .' | '. config('app.name') : config('app.name') }}  </title>
  <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet"> --}}
    @yield('stylesheet1')
     <!-- FONTAWESOME STYLES-->
        <!-- Custom CSS -->
    <link href="{{ asset('bootstrap/icons/font-awesome/css/fontawesome-all.css') }}" rel="stylesheet">
     <!-- MORRIS CHART STYLES-->
    
        <!-- CUSTOM STYLES-->
    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet" /> --}}
    <style type="text/css">
      /* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  line-height: 60px; /* Vertically center the text there */
  background-color: #f5f5f5;
}


/* Custom page CSS
-------------------------------------------------- */
/* Not required for template or sticky footer method. */

body > .container {
  padding: 60px 15px 0;
}

.footer > .container {
  padding-right: 15px;
  padding-left: 15px;
}

code {
  font-size: 80%;
}
    </style>
    @yield('stylesheet')

    @stack('stylesheets')

     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->

    <!-- Date et heure -->
    <script type="text/javascript" src="{{ asset('js/date-heure.js') }}"></script>

</head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand " href="#">CONTRÔLE DES DOCUMENTS </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            {{-- <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li> --}}
          </ul>
          <ul class="navbar-nav mt-2 mt-md-0">
            <li class="nav-item ">
              <a class="nav-link" href="{{ route(auth()->user()->user_role.'.index') }}">Acceuil <span class="sr-only">(current)</span></a>
            </li>
            @if(auth()->user()->user_role == 'admin')
            <li class="nav-item ">
              <a class="nav-link" href="{{ route('admin.get_prof') }}">Professeurs <span class="sr-only">(current)</span></a>
            </li>
            @endif
            <li class="nav-item ">
              <a class="nav-link" href="#">Mon profil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class=" nav-link">Déconnexion</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </li>
            {{-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
          </ul>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <br>
      {{-- @include('partials._msgFlash') --}}
      @yield('content')
    </main>

    <footer class="footer">
      <div class="container">
        @include('layouts.partials._footer')
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src={{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}></script>

      <!-- BOOTSTRAP SCRIPTS -->
    <script src={{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}></script>
    <script src={{ asset('bootstrap/js/bootstrap.bundle.min.js') }}></script>


    <!-- METISMENU SCRIPTS -->
    <script src="{{ asset("js/jquery.metisMenu.js") }}"></script>

    @stack('scripts')


         <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset("js/custom.js") }}"></script>
    <script src="{{ asset("js/raphael-2.1.0.min.js") }}"></script>
    <script src="{{ asset("js/morris.js") }}"></script>
    <script type="text/javascript">window.onload = date_heure('date_heure');</script>


    <script type="text/javascript">
        $(function () {
                      $('[data-toggle="popover"]').popover()
                    })
    </script>
    
       {{-- PACKAGES --}}
    <!--Flashy -->
    {{-- @include('flashy::message') --}}
</body>
</html>