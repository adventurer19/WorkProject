<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Product System</title>

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    {{--        <link rel="icon" href="{{ url('storage/favicon.jpg') }}">--}}

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('icon.ico')}}">
    <link rel="icon" type="image/png" href="{{ asset('icon.png') }}">
    <!-- JS -->


    <script src="{{asset('js/app.js')}}" defer></script>
</head>
<body>
<div class="bg-image"
     style="background-image: url('https://wallpaperaccess.com/full/16692.jpg');
            height: 100vh">
    <nav class="navbar navbar-expand-lg p-2">
        @auth <a class="navbar-brand">Logged as {{Auth::user()->name}}</a> @endauth
        <div class="container">
            {{--            "nav navbar-nav navbar-right"--}}

            {{--            @auth <a class="navbar-brand">Logged as {{Auth::user()->name}}</a> @endauth--}}
            <a class="navbar-brand " href="{{route('panel')}}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
            <div class="form-inline my-2 my-lg-0">
                @if (Route::has('login'))

                    <div>
                        @auth
                            <a href="{{route('/') }}" style="text-decoration: none;padding: 10px">Switch to Public
                                Panel</a>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit(); "
                               style="text-decoration: none;padding: 10px">Logout</a>
                            <form id="logout-form" action="{{route('logout')}} " method="post"
                                  style="display: none;text-decoration: none">
                                @csrf
                            </form>
                        @else

                            <a href="{{ route('login') }}" style="text-decoration: none">Login</a>

                            {{--                                @if (Route::has('register'))--}}
                            {{--                                    <a href="{{ route('register') }}" >Register</a>--}}
                            {{--                                @endif--}}
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    @can('logged-in')
        <nav class="navbar sub-nav navbar-expand-lg" style="background: transparent">
{{--        <nav class="navbar sub-nav navbar-expand-lg">--}}
            <div class="container" >
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul  class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            {{--                        <a class="nav-link" href="{{route('/')}}">Home</a>--}}
                        </li>
                        @can('is-admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.users.index')}}" style="color: white" >Users</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('product.index')}}" style="color: white" >Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.index')}}" style="color: white" >Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('search')}}" style="color: white" >Search</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endcan
    {{--
    TODO
     1. HTML fix
     2. Search + Table of Products /List and after search submit filtered list
     3.  php sniffer za laravel jet brains /laravel => code sniffer  php
     4. categeries auto complete or select list.


    --}}


    <main class="container">
@csrf
        @include('partials.alerts')

        @yield('content')
    </main>
</div>
</body>

</html>
