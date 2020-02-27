<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CheIT test task</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{--    <script src="{{ asset('js/jquery.min.js') }}"></script>--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/png">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
{{--        <div class="container">--}}
{{--            <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                Black Stage--}}
{{--            </a>--}}
{{--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"--}}
{{--                    aria-controls="navbarSupportedContent" aria-expanded="false"--}}
{{--                    aria-label="{{ __('Toggle navigation') }}">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}

{{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                <!-- Left Side Of Navbar -->--}}
{{--                <ul class="navbar-nav mr-auto">--}}
{{--                    <a href="{{ route('home') }}" class="w3-button w3-bar-item">Home</a>--}}
{{--                    <a href="{{ route('carsPage') }}" class="w3-button w3-bar-item">Cars</a>--}}
{{--                    <a href="{{ route('tracksPage') }}" class="w3-button w3-bar-item">Tracks</a>--}}
{{--                    <a href="{{ route('recordsPage') }}" class="w3-button w3-bar-item">Records</a>--}}
{{--                    <a href="{{ route('newsPage') }}" class="w3-button w3-bar-item">News</a>--}}
{{--                    @if (!empty(Auth::user()) && Auth::user()->role >= \App\User::$roles['admin'])--}}
{{--                        <a href="{{ route('usersList') }}" class="w3-button w3-bar-item">Users</a>--}}
{{--                    @endif--}}
{{--                </ul>--}}

{{--                <!-- Right Side Of Navbar -->--}}
{{--                <ul class="navbar-nav ml-auto">--}}
{{--                    <!-- Authentication Links -->--}}
{{--                    @guest--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                        </li>--}}
{{--                        @if (Route::has('register'))--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    @else--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"--}}
{{--                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                            </a>--}}

{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                <a class="dropdown-item" href="{{ route('profile', Auth::user()->id) }}">Profile</a>--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--                                      style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endguest--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

{{--    @if (!(new \Jenssegers\Agent\Agent())->isMobile())--}}
{{--        <footer class="card-footer font-small pt-4" id="footer">--}}
{{--            <div class="container-fluid text-center text-md-left">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6 mt-md-0 mt-3">--}}
{{--                        <h5 class="text-uppercase">@InitialD Black Stage Official Website</h5>--}}
{{--                        @if (env('VERSION'))--}}
{{--                            <p><small>Version: {{ env('VERSION') }}</small></p>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <hr class="clearfix w-100 d-md-none pb-3">--}}
{{--                    <div class="col-md-3 mb-md-0 mb-3">--}}
{{--                        <h5 class="text-uppercase">Links</h5>--}}
{{--                        <ul class="list-unstyled">--}}
{{--                            @if (env('CONTACTS_EMAIL'))--}}
{{--                                <li>--}}
{{--                                    <a href="mailto:{{ env('CONTACTS_EMAIL') }}" target="_blank">Contacts email</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                            @if (env('CONTACTS_TELEGRAM'))--}}
{{--                                <li>--}}
{{--                                    <a href="{{ env('CONTACTS_TELEGRAM') }}" target="_blank">Contacts telegram</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                            @if (env('CONTACTS_VK'))--}}
{{--                                <li>--}}
{{--                                    <a href="{{ env('CONTACTS_VK') }}" target="_blank">Contacts VK</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                            @if (env('CREATOR_VK'))--}}
{{--                                <li>--}}
{{--                                    <a href="{{ env('CREATOR_VK') }}" target="_blank">Modification author VK</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                            @if (env('VK_GROUP'))--}}
{{--                                <li>--}}
{{--                                    <a href="{{ env('VK_GROUP') }}" target="_blank">Offitial VK group</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </footer>--}}
{{--    @endif--}}
</div>
</body>
</html>
