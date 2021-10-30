@csrf
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="name" value="{{old('name')}}@isset($user){{$user->name}} @endisset ">
    @error('name')
    <span class="invalid-feedback" role="alert">
                                {{ $message}}
                            </span>
    @enderror
</div>

<div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <input type="text" name="category" class="form-control @error('category') is-invalid @enderror"
           id="category"
           aria-describedby="category"
           value="{{old('category')}}@isset($user){{$user->name}} @endisset ">
    @error('category')
    <span class="invalid-feedback" role="alert">
                                {{ $message}}
                            </span>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
           id="description"
           aria-describedby="description"
           value="{{old('description')}}@isset($user){{$user->name}} @endisset ">
    @error('description')
    <span class="invalid-feedback" role="alert">
                                {{ $message}}
                            </span>
    @enderror
</div>

<div class="row">
    <label for="image" class="col-md-4 col-form-label"></label>
    <input type="file" class="form-control-file" id="image" name="image">
    @error('image')
    <p class="" role="alert" style="color:#dc3545;font-size:15px;">
                   {{ $message }}
                </p>
    @enderror
</div>



{{--<div class="mb-3">--}}
{{--    <label for="email" class="form-label">Email address</label>--}}
{{--    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{old('email')}}--}}
{{--    @isset($user){{$user->email}} @endisset ">--}}

{{--    @error('email')--}}
{{--    <span class="invalid-feedback" role="alert">--}}
{{--                                {{$message}}--}}
{{--                            </span>--}}
{{--    @enderror--}}
{{--    --}}
{{--</div>--}}


{{--@isset($create)--}}
{{--<div class="mb-3">--}}
{{--    <label for="password" class="form-label">Password</label>--}}
{{--    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">--}}
{{--    @error('password')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--            {{$message}}--}}
{{--        </span>--}}
{{--    @enderror--}}
{{--</div>--}}
{{--<div class="mb-3">--}}
{{--    <label for="password_confirmation" class="form-label">Password Confirm</label>--}}
{{--    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">--}}
{{--    @error('password_confirmation')--}}
{{--    <span class="invalid-feedback" role="alert">--}}
{{--            {{$message}}--}}
{{--        </span>--}}
{{--    @enderror--}}
{{--</div>--}}
{{--@endisset--}}
<button type="submit" class="btn btn-primary">Submit</button>
