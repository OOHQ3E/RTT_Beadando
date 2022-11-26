<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/ekke-logo2.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <title>@yield('title')</title>

</head>
<body class="bg-maintain bg-gradient-to-t from-blue-500 via-blue-600 to-blue-700 min-h-screen antialiased leading-none font-sans">



    <div id="app">
        <div x-data="{ isOpen: false }" class=" flex justify-between lg:p-8 bg-gray-100 shadow-xl py-5 mb-10">
            <div class="flex items-center">
                <a class="w-24 mx-5" href="{{ url('https://egricsillagvizsgalo.hu') }}" target="_blank">
                <img src="{{ asset('img/ekke-logo.png') }}" alt="Csillagvizsgáló és Tudományos Élményközpont"></a>
            </div>

            <div class="flex items-center justify-between">
                @guest
                    @else

                    <span class="text-lg font-bold text-red-500 mx-6">{{ Auth::user()->name }}</span>
                @endguest
                <button @click="isOpen = !isOpen" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black lg:hidden mx-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="hidden space-x-6 lg:inline-block">
                    @guest

                    <a id="LoginButton" class="text-lg text-black px-2 py-3 rounded-lg transition hover:text-white hover:bg-gray-500" href="{{ route('login') }}">{{ __('Bejelentkezés') }}</a>
                    <a id="QuizButton" class="text-lg text-black px-3 py-3 rounded-lg transition hover:text-white hover:bg-gray-500" href="/" class="text-base text-black ">{{ __('Kvíz') }}</a>
                    <a id="LeaderBoardButton" class="text-lg text-black px-3 py-3 rounded-lg transition hover:text-white hover:bg-gray-500" href="{{ route('leaderboards') }} " class="text-base text-black ">{{ __('Ranglista') }}</a>

                    @if (Route::has('register'))
                    <a id="RegisterButton" class="text-lg text-black px-3 py-3 rounded-lg transition hover:text-white hover:bg-gray-500" href="{{ route('register') }}">{{ __('Regisztráció') }}</a>
                    @endif

                    @else
                    <a id="QuizButton" class="text-lg text-black px-3 py-3 rounded-lg transition hover:text-white hover:bg-gray-500" href="/" class="text-base text-black ">{{ __('Kvíz') }}</a>
                    <a id="SettingsButton" class="text-lg text-black px-3 py-3 rounded-lg transition hover:text-white hover:bg-gray-500" href="{{ route('settings') }}" class="text-base text-black ">{{ __('Beállítások') }}</a>
                    <a id="LeaderBoardButton" class="text-lg text-black px-3 py-3 rounded-lg transition hover:text-white hover:bg-gray-500" href="{{ route('leaderboards') }} " class="text-base text-black ">{{ __('Ranglista') }}</a>
                    <a id="LogoutButton" href="{{ route('logout') }}"
                               class="text-lg text-black px-2 py-3 rounded-lg transition hover:text-white hover:bg-red-500"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Kijelentkezés') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    @endguest
                </div>


                <div class="mobile-navbar">

                    <div id="menu" class="fixed left-0 w-full h-45 p-5 bg-gray-200 rounded-lg shadow-xl top-16" x-show="isOpen"
                        @click.away=" isOpen = false">
                        <div class="flex flex-col space-y-6">

                            @guest

                            <a id="Login"  class="text-sm text-black hover:bg-gray-500 rounded-lg p-3" href="{{ route('login') }}">{{ __('Bejelentkezés') }}</a>
                            <a id="Quiz"  href="/" class="text-sm text-black hover:bg-gray-500 rounded-lg p-3">{{ __('Kvíz') }}</a>
                            <a id="Leaderboard"  href="{{ route('leaderboards') }} " class="text-sm text-black hover:bg-gray-500 rounded-lg p-3">{{ __('Ranglista') }}</a>

                            @if (Route::has('register'))
                            <a id="Register"  href="{{ route('register') }}" class="text-sm text-black hover:bg-gray-500 rounded-lg p-3">{{ __('Regisztráció') }}</a>
                            @endif

                            @else
                            <a id="Quiz"  href="/" class="text-sm text-black hover:bg-gray-500 rounded-lg p-3">{{ __('Kvíz') }}</a>
                            <a id="Settings" href="{{ route('settings') }}" class="text-sm text-black hover:bg-gray-500 rounded-lg p-3">{{ __('Beállítások') }}</a>
                            <a id="Leaderboard" href="{{ route('leaderboards') }} " class="text-sm text-black hover:bg-gray-500 rounded-lg p-3">{{ __('Ranglista') }}</a>
                            <a id="Logout" href="{{ route('logout') }}"
                               class="text-sm text-black hover:bg-red-500 rounded-lg p-3"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Kijelentkezés') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>



        </div>

        @yield('content')
    </div>

</body>
@yield('optioinal_style')
</html>



