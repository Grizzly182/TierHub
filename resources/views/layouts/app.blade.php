<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TierHub') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @viteReactRefresh
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body style="background: #1a1a1a">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-black shadow-sm" style="border-bottom: 1px solid #636363">
            <div class="container">
                <a class="navbar-brand text-bold align-items-center d-flex" href="{{ url('/') }}">
                    <img height="40" width="40" src="{{asset('storage/images/TierHubLogo.png')}}">
                    {{ config('app.name', 'TierHub') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('templates.create') }}"
                                    class="btn btn-warning">{{ __('Создать шаблон') }}</a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">{{ __('Главная') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories') }}" class="nav-link">{{ __('Категории') }}</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">
                                        {{ __('Мой профиль') }}
                                    </a>
                                    @if (Auth::user()->hasRole('Moderator'))
                                    <a class="dropdown-item" href="{{ route('templates.moderate') }}">
                                        {{ __('Панель модератора') }}
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                <div class="row justify-content-center text-white-50 pt-3 text-center">
                    <p>© 2024 TierHub. Все права защищены.</p>
                    <p>Made with <i class="fa-solid fa-heart"></i> by TierHub team</p>

                </div>
            </div>
        </footer>
    </div>
</body>
</html>