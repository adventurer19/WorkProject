<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index',['products'=>Product::paginate(10)]);

        // return view('product.index',['products'=>Product::paginate(10)]);
       // todo
        //return view('admin.users.index',['users'=>User::paginate(10)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $imagePath = $request['image']->store('uploads','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(500,500);
        $image->save();
        auth()->user()->products()->create([
            'name'=>$request['name'],
            'category'=>$request['category'],
            'description'=>$request['description'],
            'image'=>$imagePath
        ]);
        $request->session()->flash('success','You have successfully added a new product.');

        return redirect(route('product.index'));






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('product.edit',['product'=>Product::find($id)]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        if(!$product){
            $request->session()->flash('error','You can not edit this product.');
            return redirect(route('product.index'));

        }

        $product->update($request->except('image'));

        $request->session()->flash('success','The Product is edited successfully.');

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        Product::destroy($id);
        $request->session()->flash('success','The product is deleted successfully.');
        return redirect(route('product.index'));

    }
}
