<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
    crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <title>Notice LY</title>
    
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>

    <div class="container">
        
        <div class="forms-container">
        <img src="{{asset('image/logo.png')}}" alt="" height="100px" class="logo-image">
          <div class="signin-signup">
          
            <form class="form_right" method="POST" action="{{ route('login') }}">
                @csrf
               
              <h2 class="title">Sign in</h2>
            
                <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              </div>
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong >{{ $message }}</strong>
              </span>
              @enderror
              <button type="submit" value="Login" class="btn solid"> {{ __('Login') }}</button>
           
            </form>
            
          </div>
        </div>
        <div class="panels-container">
          <div class="panel left-panel">
            <div class="content">  
            </div>
            <img src="{{asset('image/log.svg')}}" class="image" alt="" />
          </div>
         
        </div>
      </div>
</body>

