@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-12 p-3">
            <h1 class="float-left">All Products</h1>
            <a class="btn btn-sm btn-success "  href="{{route('product.create')}}" role="button" >Add New Product</a>
            <a class="btn btn-sm btn-success "  href="category.blade.php" role="button" >Add New Category</a>
        </div>
    </div>
    <div class="card">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->name}}</th>
                    <td>{{$product->category}}</td>
                    <td>{{$product->description}}</td>
                    <td><img src="/storage/{{$product->image}}" style="width: 50px;height: 50px" alt=""></td>
                                    <td>
                        <a class="btn btn-sm btn-primary" href="{{route("product.edit",$product->id)}}" role="button" >Edit</a>
                        <button type="button" class="btn btn-sm btn-danger"
                                onclick="event.preventDefault();
                                    if(confirm ('are you sure')){
                                    document.getElementById('delete-user-form-{{$product->id}}').submit()
                                    }
                                    ">
                            Delete
                        </button>
                        <form id="delete-user-form-{{ $product->id }}" action="{{route('product.destroy',$product->id)}}" method="POST" style="display: none">
                            @csrf
                            @method("DELETE")
                        </form>

                    </td>

                </tr>
                    @endforeach
            </tbody>
        </table>

    </div>

@endsection
