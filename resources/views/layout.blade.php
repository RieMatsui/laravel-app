<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo App</title>
    @include('share.flatpickr.styles')
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <a class="my-navbar-brand" href="/">ToDo App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Authentication Links -->
                    @if(Auth::check())
                    <li class="nav-item">
                        <span href="#" id="login_user_name" class="nav-link">{{__('messages.welcome')}}
                            {{ Auth::user() -> name }}{{__('messages.user')}}</span>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="logout" class="nav-link">{{__('messages.logout')}}</a>
                    </li>
                    <form id="logout_form" class="logout" action="{{ route('logout') }}" method="POST"
                        style="display:none">
                        @csrf
                    </form>
                    @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                    </li>
                    @endif
                    <ul class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ config('languages')[App::getLocale()] }}
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                            </li>
                            @endif
                            @endforeach
                        </div>
                    </ul>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
    @if(Auth::check())
    <script src="{{asset('/assets/js/logout.js')}}"></script>
    @endif

    @yield('scripts')
</body>

</html>
