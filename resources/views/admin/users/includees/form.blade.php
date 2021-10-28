@csrf
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="name" value="{{old('name')}}@isset($user){{$user->name}} @endisset ">
    @error('name')
    <span class="invalid-feedback" role="alert">
                                {{ $message}}}
                            </span>
    @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{old('email')}}
    @isset($user){{$user->email}} @endisset ">

    @error('email')
    <span class="invalid-feedback" role="alert">
                                {{$message}}}
                            </span>
    @enderror
</div>
@isset($create)
<div class="mb-3">
    <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
    <input type="password" name="password" class="form-control" id="password">
    @error('password')
    <span class="invalid-feedback" role="alert">
                                {{$message}}}
                            </span>
    @enderror
</div>
@endisset
<button type="submit" class="btn btn-primary">Submit</button>
