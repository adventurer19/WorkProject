@extends('templates.main')

@section('content')
    <div class="col-md-4 offset-4 card" >
        <h1>Add Product</h1>
        <form method="POST" enctype="multipart/form-data" action="{{route('product.store')}}">
            @include('product.includes.form',['create'=>true])
        </form>
    </div>

@endsection
