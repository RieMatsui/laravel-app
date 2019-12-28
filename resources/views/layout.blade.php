<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo App</title>
    @yield('styles')
    <script src="/js/app.js"></script>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <a class="my-navbar-brand" href="/">ToDo App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      </ul>
    </div>
  </nav>
  </header>
  <main>
    @yield('content')
  </main>
  @yield('scripts')
</body>
</html>
