@extends('body.main')

@section('content')

    <div class="col-md-4 offset-4 card">
        <h1>Edit Category</h1>
        <form method="POST" action="{{route('category.update',$category->id)}}} ">
            @method('PATCH')
            @include('category.includes.form')
        </form>
    </div>

@endsection
