@extends('body.main')

@section('content')

    <div class="col-md-4 offset-4 card">
        <h1>Create New User</h1>
        <form method="POST" action="{{route('admin.users.store')}} ">
            @include('admin.users.includes.form',['create'=>true])
        </form>
    </div>

@endsection
