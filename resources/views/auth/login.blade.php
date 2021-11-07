@extends('body.public')

@section('public')
    <div class="col-md-4     offset-4 card">
        <h1>Login</h1>
        <form method="post" action="{{route('login')}} ">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                       aria-describedby="email" value="{{old('email')}}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                {{$message}}
                            </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                {{$message}}
                            </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

@endsection
