@extends('body.main')

@section('content')
    <div style="margin: 250px">
    </div>
    <div class="card p-1 col-4 offset-4 align-items-right" >
        <form action="{{route('list')}}" method="get">

<div class="p-2">


            <label for="product">
                Product Name
                <input name="product" type="text" placeholder="Search.. "  >
            </label>
</div>
<div class="p-2">


            <label for="category">
                Category
                <select id="cars" name="category" style="border:none">
                    @foreach($categories as $category)

                        <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                    <option value="empty">no category</option>

                </select>
            </label>
</div>
        <div class="offset-10">
            <button class="btn btn-sm btn-primary" href="{{route('list')}}" role="button">Search
            </button>

        </div>
        </form>
    </div>
{{--    <div class="card m-5">--}}
{{--        <table class="table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th scope="col">#Id</th>--}}
{{--                <th scope="col">Product Name</th>--}}
{{--                <th scope="col">Description</th>--}}
{{--                <th scope="col">Category</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <th> 123 </th>--}}
{{--                <td> 123</td>--}}
{{--                <td> 123</td>--}}
{{--                <td>--}}


{{--                </td>--}}

{{--            </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--    </div>--}}



@endsection
