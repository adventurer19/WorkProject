@extends('body.main')

@section('content')
    <div class="col-md-4 offset-4 card" >
        <h1>Add New Category</h1>
        <form method="POST" enctype="multipart/form-data" action="{{route('category.store')}}">
            @include('category.includes.form',['create'=>true])
        </form>
    </div>

@endsection
