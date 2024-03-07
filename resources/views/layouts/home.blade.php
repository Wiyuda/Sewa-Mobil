<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar bg-primary" data-bs-theme="dark">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Sewa Mobil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('home') }}">Catalog</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            @if (Auth::user())
              @hasrole('admin')
                <a href="{{ route('dashboard') }}" class="nav-link fw-bold text-white">Dashboard</a>
              @else
                <div class="dropdown">
                  <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                  </a>
                
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('history') }}">Status Sewa</a></li>
                    <li>
                      <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Sign Out </button>
                      </form>
                    </li>
                  </ul>
                </div>
              @endhasrole
            @else
              <a href="{{ route('login') }}" class="nav-link fw-semibold text-white">Sign In</a>
              <a href="{{ route('register') }}" class="nav-link fw-bold text-white">Sign Up</a>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @stack('scripts')
  </body>
</html>