@extends('body.main')

@section('content')
    <div class="col-md-4 offset-4 card" >
        <h1>Add Category</h1>
        <form method="POST" enctype="multipart/form-data" action="{{route('product.store')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="name" value="{{old('name')}}@isset($product){{$product->name}} @endisset ">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                {{ $message}}
                            </span>
                @enderror
            </div>
        </form>
    </div>

@endsection
