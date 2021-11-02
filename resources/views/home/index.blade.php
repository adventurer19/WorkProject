
<div style="margin: 200px">
        </div>
        <div class="card p-2 col-4 offset-4 align-items-right" >
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

                            <option value="{{$category->user}}">{{$category->name}}</option>
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
