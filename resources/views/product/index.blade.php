@extends('body.main')

@section('content')
    <div class="row">
        <div class="col-12 p-2">
            <h1 class="float-left" style="color: white" >All Products</h1>
            <a class="btn btn-sm btn-success " href="{{route('product.create')}}" role="button">Add New Product</a>
        </div>
    </div>
    <div class="card ">
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
                <tr class="m-5">
                    <th scope="row"><a href="{{route("product.show",$product->id)}}"
                                       style="text-decoration: none;color: #1E2632">{{$product->name}}</a></th>
                    <td>{{$product->category()->first()->name}}</td>
                    <td>{{$product->description}}</td>
                    <td><a href="{{route("product.show",$product->id)}}">
                            <img src="/storage/{{$product->image}}" href="{{"product.show,$product->id"}}"
                                 style="width: 40px;height: 35px" alt="">
                        </a></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{route('product.edit',$product->id)}}" role="button">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger"
                                onclick="event.preventDefault();
                                        if(confirm ('are you sure')){
                                        document.getElementById('delete-user-form-{{$product->id}}').submit()
                                        }
                                        ">
                            Delete
                        </button>
                        <a class="btn btn-sm btn-success" href="{{route("product.show",$product->id)}}" role="button">Details</a>

                        <form id="delete-user-form-{{ $product->id }}"
                              action="{{route('product.destroy',$product->id)}}" method="POST" style="display: none">
                            @csrf
                            @method("DELETE")
                        </form>

                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>

@endsection
