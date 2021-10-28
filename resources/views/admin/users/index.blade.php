@extends('templates.main')

@section('content')
<div class="row">
    <div class="col-12 p-3">
        <h1 class="float-left">Users</h1>
        <a class="btn btn-sm btn-success "  href="{{route('admin.users.create')}}" role="button" >Add User</a>


    </div>
</div>
    <div class="card">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route("admin.users.edit",$user->id)}}" role="button" >Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger"
                                            onclick="event.preventDefault();
                                                document.getElementById('delete-user-form-{{$user->id}}').submit()">
                                        Delete
                                    </button>
                                <form id="delete-user-form-{{ $user->id }}" action="{{route('admin.users.destroy',$user->id)}}" method="POST" style="display: none">
                                    @csrf
                                    @method("DELETE")
                                </form>

                                <!-- making hidden form because we have to make delete method which is not support from all browsers -->
                                <!-- after that we are passing the form to button and with a little js we are removing the default action of the button and -->
                                <!-- we setting it to get the specific elementByID which is "$user->id" or not specified it will delete the first form  -->


                            </td>

                        </tr>
                @endforeach
            </tbody>
        </table>


    </div>

@endsection
