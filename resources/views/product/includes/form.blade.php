@csrf
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
           aria-describedby="name" value="{{old('name')}}@isset($product){{$product->name}} @endisset ">
    @error('name')
    <span class="invalid-feedback" role="alert">
                                {{ $message}}
                            </span>
    @enderror
</div>

<div class="mb-3">
    <label for="category" class="form-label">
        Category
        <select id="category" name="category" style="border:none">
            @foreach($data as $category)
                <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
            <option value="">no category</option>
        </select>
    </label>
</div>


{{--<div class="mb-3">--}}
{{--    <label for="category" class="form-label">Category</label>--}}
{{--    <input type="text" name="category" class="form-control @error('category') is-invalid @enderror"--}}
{{--           id="category"--}}
{{--           aria-describedby="category"--}}
{{--           value="{{old('category')}}@isset($product){{$product->category}} @endisset ">--}}
{{--    @error('category')--}}
{{--    <span class="invalid-feedback" role="alert">--}}
{{--                                {{ $message}}--}}
{{--                            </span>--}}
{{--    @enderror--}}
{{--</div>--}}

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
           id="description"
           aria-describedby="description"
           value="{{old('description')}}@isset($product){{$product->description}} @endisset ">
    @error('description')
    <span class="invalid-feedback" role="alert">
                                {{ $message}}
                            </span>
    @enderror
</div>

<div class="row">
    <label for="image" class="col-md-4 col-form-label"></label>
    <input type="file"  class="form-control-file" id="image"  name="image">
    @error('image')
    <p class="" role="alert" style="color:#dc3545;font-size:15px;">
        {{ $message }}
    </p>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Submit</button>

