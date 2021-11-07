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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>


</head>
<body>
<div class="bg-image"
     style="background-image: url('https://www.palmabeach.bg/wp-content/uploads/2021/04/imported_rokka.jpg');
            height: 100vh">
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
@csrf
        @if(!request()->set)
        <div class="p-5">
        </div>
        <div class="row col-4 card offset-4 border-2">
            <form action="{{route('public.index')}}" method="get" id="list">
                <label for="product" class="form-label d-flex">
                    <input name="product" type="text" placeholder="Product name.. " value="{{old('product')}}"
                           class="form-control
                           @error('product') is-invalid @enderror"
                    aria-describedby="product" >
                    @error('product')
                    <span class="invalid-feedback" role="alert">
          {{ $message}}
          </span>
                    @enderror
                </label>
                <hr>


                                <label for="category" class="form-label d-flex ">
                                    <input type="text"   class="form-control"  name="category" id="category"  placeholder="Category name.. " />
                                </label>
                <hr>
{{--                <label for="" class="form-label offset-2 ">--}}
{{--                    Check categories--}}
{{--                    <select id="" name="" style="border:none">--}}
{{--                        <option value="">Click me</option>--}}
{{--                        @foreach(\App\Models\Category::all() as $category)--}}
{{--                            <option value="{{$category->name}}">{{$category->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </label>--}}
                <div class="form-check offset-2">
                    <input class="form-check-input " type="checkbox"  name="ignore" id="ignore">
                    <label class="form-check-label" for="ignore">
                        Ignore Category
                    </label>
                </div>

            </form>


            <div class="g-3 offset-2 ">

                <a type="submit" form="list" href="{{route('public.index',['last'=>'last'])}}"
                   class="btn btn-sm btn-primary"> Recent </a>
                <button type="submit" form="list" value="submit" class="btn btn-sm btn-primary"> Search</button>
            </div>

        </div>
        @endif
        @yield('public')
    </main>
</div>
</body>
</html>

<script>

    var path = "{{ url('typeahead_autocomplete/action') }}";

    $('#category').typeahead({

        source: function(query, process){

            return $.get(path, {query:query}, function(data){

                return process(data);

            });

        }

    });

</script>





