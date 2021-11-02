@extends('body.main')

@section('content')
    <div class="row">
        <div class="col-12 p-3 ">
            <h1 class="float-left">List of all Categories</h1>
            <a class="btn btn-sm btn-success "  href="{{route('category.create')}}" role="button" >Add New Category</a>
        </div>
    </div>
    <div class="card">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Category Name</th>
                <th scope="col"> Added from</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $category)
                <tr>
                    <th scope="row">{{$category->name}} </th>
                    <th scope="row">{{$category->user()->first()->name}}</th>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{route("category.edit",$category->id)}}" role="button" >Edit</a>
                        <button type="button" class="btn btn-sm btn-danger"
                                onclick="event.preventDefault();
                                    if(confirm ('are you sure')){
                                    document.getElementById('delete-user-form-{{$category->id}}').submit()
                                    }
                                    ">
                            Delete
                        </button>
                        <form id="delete-user-form-{{ $category->id }}" action="{{route('category.destroy',$category->id)}}" method="POST" style="display: none">
                            @csrf
                            @method("DELETE")
                        </form>
                    </td>

                </tr>
                    @endforeach
            </tbody>
        </table>
{{$data->links()}}
    </div>

@endsection
