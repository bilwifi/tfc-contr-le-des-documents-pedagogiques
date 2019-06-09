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
    
    <!-- Custom styles for this template -->
    <style type="text/css">
        html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf
      {{-- <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> --}}
      <h1><span class="fas fa-lock fa-2x" ></span></h1><br>
      <h1 class="h5 mb-5 font-weight-normal">CONTRÔLE DES DOCUMENTS</h1>
        @include('partials._msgFlash')
      
      <label for="inputEmail" class="sr-only">Pseudo</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Nom d'utilisateur " name="pseudo" required autofocus>
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
      {{-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> --}}
      <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
      <br>
       @include('layouts.partials._footer')
    </form>
  </body>

<!-- Mirrored from getbootstrap.com/docs/4.1/examples/sign-in/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 23:41:53 GMT -->
</html>
