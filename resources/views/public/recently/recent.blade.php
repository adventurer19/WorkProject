@extends('public.index')
@section('content')
<div class="card m-3 ">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->category()->first()->name}}</td>
                <td>
                    <a href="{{route("public.show",$product->id)}}" role="button" >
                        <img src="/storage/{{$product->image}}"  style="width: 40px;height: 35px" alt=""></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
{{--    <a class="btn btn-sm btn-outline-primary" href="{{route('/')}}" role="button" >Back to the search</a>--}}

</div>


@endsection

