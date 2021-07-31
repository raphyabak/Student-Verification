<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>OAUSTECH E-Verify System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">



    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .card-horizontal {
            display: flex;
            flex: 1 1 auto;
        }

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
    <link href="{{ asset('css/heroes.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div class="container">
        <header class="flex-wrap py-3 mb-4 d-flex align-items-center justify-content-center justify-content-md-between border-bottom">
          <a href="/" class="mb-2 d-flex align-items-center col-md-3 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
          </a>
          <div class="col-md-3 text-end">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <button type="submit" class="btn btn-lg btn-outline-primary me-2">Logout {{Auth::user()->name}}</button>
            {{-- <button type="button" class="btn btn-primary">Sign-up</button> --}}
        </form>
          </div>
        </header>
      </div>

    <main>
        @livewire('verify')
    </main>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @livewireScripts
</body>

</html>
