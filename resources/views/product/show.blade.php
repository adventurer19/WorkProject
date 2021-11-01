@extends('body.main')

@section('content')
    <div class="card col-5 offset-3">
        <div class="row">
            <div class="col-sm-8">
                <img src="/storage/{{$product->image}}" class="" alt="/views/errors/no-imageava.jpg" >
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
                    TODO
                </span>
                <hr>
                <a class="btn btn-sm btn-outline-primary" href="{{route('product.index')}}" role="button" >Back to list</a>


                {{--                                    <p><span class="font-weight-bold"><a > adas</a>--}}
{{--                                           dasda--}}
{{--                                        </span></p>--}}

            </div>
        </div>
    </div>
    </div>

@endsection
