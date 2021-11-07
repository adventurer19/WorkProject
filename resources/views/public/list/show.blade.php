@extends('public.index')
@section('content')

    <div class="p-5"></div>
    <div class="card col-5 offset-3">
        <div class="row">
            <div class="col-sm-8">
                <img src="/storage/{{$product->image}}" class="" alt="/views/errors/no-imageava.jpg">
            </div>
            <div class="col-3">
                <div>
                    <div class="d-flex align-items-center">
                    </div>
                </div>
                <strong>Product title</strong> :<span>
                    {{$product->name}}
                </span>
                <hr>
                <strong>Description</strong>:<span>
                    {{$product->description}}
                </span>
                <hr>
                <strong>Category</strong>:<span>
                    {{$product->category()->first()->name}}
                </span>
                <hr>
                {{--                <a class="btn btn-sm btn-outline-primary" href="{{ redirect(route('public.index'))}}" role="button" >Back to list</a>--}}
                {{-- todo eventally--}}


            </div>
        </div>
    </div>
    </div>

@endsection
