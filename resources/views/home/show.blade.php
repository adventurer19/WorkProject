<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Product System</title>
    <link   href="{{asset('css/app.css')}}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('icon.ico')}}">
    <link rel="icon" type="image/png" href="{{ asset('icon.png') }}">

    <script src="{{asset('js/app.js')}}" defer></script>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand " href="{{route('/')}}" >Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
        <div class="form-inline my-2 my-lg-0">
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{route('panel') }}  " style="text-decoration: none" >Admin Panel</a>
                        <span>{{auth()->id()}}</span>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit(); " style="text-decoration: none">Logout</a>
                        <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" >Login</a>

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}" >Register</a>--}}
                        @endif
                    @endauth
            </div>
        </div>
    </div>
</nav>

<main class="container">
    <div class="p-5"></div>
    <div class="card col-5 offset-3">
        <div class="row">
            <div class="col-sm-8">
                <img src="/storage/{{$product->image}}" class="" alt="/views/errors/no-imageava.jpg" >
            </div>
            <div class="col-3">
                <div>
                    <div class="d-flex align-items-center">
                    </div>
                </div>
                <strong>Product title</strong> :<span>
                    {{$product->name}}
                </span>
                <hr>
                <strong>Description</strong>:<span>
                    {{$product->description}}
                </span>
                <hr>
                <strong>Category</strong>:<span>
                    {{$product->category()->first()->name}}
                </span>
                <hr>
{{--                <a class="btn btn-sm btn-outline-primary" href="{{ redirect(route('public.index'))}}" role="button" >Back to list</a>--}}
{{-- todo eventally--}}


            </div>
        </div>
    </div>
    </div>


</main>

</body>
</html>



