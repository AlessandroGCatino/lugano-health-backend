<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('lugano.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lugano Health | @yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @vite(['resources/js/registerValidation.js'])
    @vite(['resources/js/editValidation.js'])
</head>

<body>

<div class="px-5 py-2 pt-1 d-green-bg">
    <nav id="top" class="rounded-4 px-5 mt-4 navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
            <a id="app-title" class="lugano-health" href="{{ url('http://localhost:5174/') }}">LUGANO HEALTH</a>

            <button class="navbar-toggler p-1" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width='1em' height='1em'
                    fill='white'>
                    <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                </svg>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item mt-3 mt-md-0 text-center ms-md-3 ms-0">
                            <a class="nav-link btn btn-success" href="{{ route('login') }}">{{ __('ACCEDI') }}</a>
                        </li>
                    @if (Route::has('register'))
                        <li class="nav-item mt-3 mt-md-0 text-center mb-3 mb-md-0 ms-md-3 ms-0">
                            <a class="nav-link btn btn-success" href="{{ route('register') }}">{{ __('REGISTRATI') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-success" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->doctor->name }} {{ Auth::user()->doctor->surname }}
                            </a>
        
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profilo') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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
</div>

<main class="">
    @yield('content')
</main>

</body>

</html>
