<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Product System</title>

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="icon" href="{{ url('storage/favicon.jpg') }}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('icon.ico')}}">
    <link rel="icon" type="image/png" href="{{ asset('icon.png') }}">
    <!-- JS -->


    <script src="{{asset('js/app.js')}}" defer></script>
</head>
<body>
<div class="bg-image"
     style="background-image: url('https://www.palmabeach.bg/wp-content/uploads/2021/04/imported_rokka.jpg');
            height: 110vh">
    <nav class="navbar navbar-expand-lg p-2">
        @auth <a class="navbar-brand">Logged as {{Auth::user()->name}}</a> @endauth
        <div class="container">

            <a class="navbar-brand " href="{{route('search')}}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
            <div class="form-inline my-2 my-lg-0">
                @if (Route::has('login'))

                    <div>
                        @auth
                            <a href="{{route('panel')}}" style="text-decoration: none;padding: 10px">Switch on Admin
                                Panel</a>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit(); "
                               style="text-decoration: none;padding: 10px">Logout</a>
                            <form id="logout-form" action="{{route('logout')}} " method="post"
                                  style="display: none;text-decoration: none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login',['set'=>'set']) }}" style="text-decoration: none">Login</a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <main class="container">
        @include('partials.alerts')

        <div class="p-5"></div>
        <div class="card col-5 offset-3">
            <div class="row">
                <div class="col-sm-8">
                    <img src="/storage/{{$product->image}}" class="" alt="/views/errors/no-imageava.jpg">
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
                                    <a class="btn btn-sm btn-outline-primary" href="{{url()->previous()}}" role="button" >Back to list</a>

                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>




