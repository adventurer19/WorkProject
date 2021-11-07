@extends('body.main')
@section('content')
    <div class="p-5">
    </div>
    <div class="row col-4 card offset-4 border-2">
        <form action="{{route('public.index')}}" method="get" id="list">
            <label for="product" class="form-label d-flex">
                <input name="product" type="text" placeholder="Product name.. " value="{{old('product')}}"
                       class="form-control"
                       @error('product') is-invalid @enderror"
                aria-describedby="product" >
                @error('product')
                <span class="invalid-feedback" role="alert">
          {{ $message}}
          </span>
                @enderror
            </label>
            <hr>

            {{--            </div>--}}

            <label for="category" class="form-label offset-2">
                Category
                <select id="category" name="category" style="border:none">
                    @foreach($categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                    <option value="">no category</option>
                </select>

            </label>
        </form>

        <div class="g-3 offset-2 ">

            <a type="submit" form="list" href="{{route('public.index',['last'=>'last'])}}"
               class="btn btn-sm btn-primary"> Recent </a>
            <button type="submit" form="list" value="submit" class="btn btn-sm btn-primary"> Search</button>
        </div>

    </div>


@endsection
