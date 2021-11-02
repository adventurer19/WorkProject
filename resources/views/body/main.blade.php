<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Product System</title>

        <!-- Styles -->
        <link   href="{{asset('css/app.css')}}" rel="stylesheet">
{{--        <link rel="icon" href="{{ url('storage/favicon.jpg') }}">--}}

        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('icon.ico')}}">
        <link rel="icon" type="image/png" href="{{ asset('icon.png') }}">
        <!-- JS -->


        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body>
    <div class="bg-image"
         style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
            height: 110vh">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand " href="{{route('/')}}" >Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
                <div class="form-inline my-2 my-lg-0">
                    @if (Route::has('login'))

                        <div>
                            @auth
                                <a href="{{route('/') }}" style="text-decoration: none" >Public Panel</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit(); " style="text-decoration: none" >Logout</a>
                                <form id="logout-form" action="{{route('logout')}} " method="post" style="display: none;text-decoration: none">
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
    <nav class="navbar sub-nav navbar-expand-lg">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
{{--                        <a class="nav-link" href="{{route('/')}}">Home</a>--}}
                    </li>
                    @can('is-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users.index')}}">Users</a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product.index')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category.index')}}">Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endcan

   <main class="container">

       @include('partials.alerts')

       @yield('content')
   </main>
    </div>
    </body>

</html>
