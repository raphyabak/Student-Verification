<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>OAUSTECH E-Verify System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  </head>
  <body class="text-center">

<main class="form-signin">
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <img class="mb-4" src="{{ asset('osustech.jpg') }}" alt="" width="72" height="60">
    <h1 class="mb-3 h3 fw-normal">OAUSTECH E-Verify System</h1>
<p>Please sign in</p>
    <div class="form-floating">
        <input id="floatingInput" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
        <input id="floatingPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      <label for="floatingPassword">Password</label>
    </div>

    <div class="mb-3 checkbox">
      <label>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

    <div class="mt-4 text-center">
        <a href="{{url('register')}}">Are you new? Please register</a>
      </div>

    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
  </form>
</main>



  </body>
</html>
