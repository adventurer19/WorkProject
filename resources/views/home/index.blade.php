<div style="margin: 200px">
</div>
<div class="card p-2 col-4 offset-4 align-items-right">
    <form action="{{route('public.index')}}" method="get" id="list">
        <div class="p-2">
            <label for="product" class="form-label">
                Product Name
                <input name="product" type="text" placeholder="Search.. " class="form-control
                   @error('product') is-invalid @enderror"
                       aria-describedby="product">

                @error('product')
                <span class="invalid-feedback" role="alert">--}}
          {{ $message}}
          </span>
                @enderror
            </label>

            {{--            <label for="name" class="form-label">Name</label>--}}
            {{--            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="name" value="{{old('name')}}@isset($user){{$user->name}} @endisset ">--}}
            {{--            @error('name')--}}
            {{--            <span class="invalid-feedback" role="alert">--}}
            {{--                                {{ $message}}--}}
            {{--                            </span>--}}
            {{--            @enderror--}}

        </div>
        <div class="p-2">
            <label for="category">
                Category
                <select id="category" name="category" style="border:none">
                    @foreach($categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                    <option value="">no category</option>
                </select>

            </label>
        </div>
    </form>

    {{--    <div class="offset-8 d-flex">--}}
    <div class="d-block offset-8">
        <a type="submit" href="{{route('public.index',['last'=>'last'])}}" class="btn btn-sm btn-primary"> Recent </a>
        <button type="submit" form="list" value="submit" class="btn btn-sm btn-primary"> Search</button>


    </div>


    {{--                <button class="btn btn-sm btn-primary" role="button">Search--}}
    {{--                </button>--}}
</div>
</div>


