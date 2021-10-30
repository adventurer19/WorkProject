@extends('templates.main')

@section('content')

    <div class="col-md-4 offset-4 card">
        <h1>Edit User</h1>
        <form method="POST" action="{{route('admin.users.update',$user->id)}} ">
            @method('PATCH')
            @include('admin.users.includes.form')
        </form>
    </div>

@endsection
