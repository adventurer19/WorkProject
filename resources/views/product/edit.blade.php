@extends('body.main')

@section('content')

    <div class="col-md-4 offset-4 card">
        <h1>Edit Product</h1>
        <form method="POST" enctype="multipart/form-data" action="{{route('product.update',$product->id)}}">
            @method('PATCH')
            @include('product.includes.form')
        </form>

    </div>

@endsection
