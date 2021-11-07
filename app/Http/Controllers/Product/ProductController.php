<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */


    public function index()
    {

        return view(
            'product.index',
            ['products' => Product::paginate(10)],
            ['categories' => Category::paginate(10)]
        );
    }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
    public function create()
    {

        return view('product.create', ['data' => Category::all()]);
    }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   *
   * @return \Illuminate\Http\Response
   */
    public function store(StoreProductRequest $request)
    {
      dd($request->image);
        $categoryName = $request->category;
        if (!Category::where('name', $categoryName)->exists()) {
            auth()->user()->categories()->create([
            'name' => $categoryName,

            ]);
        }
      //

        $imagePath = $request['image']->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))
        ->fit(250, 250);
        $image->save();

        $idCategory = Category::where('name', $categoryName)->first()->id;
        auth()->user()->products()->create([
        'category_id' => $idCategory,
        'name' => $request['name'],
        'category' => $request['category'],
        'description' => $request['description'],
        'image' => $imagePath,
        ]);

        $request->session()
        ->flash('success', 'You have successfully added a new product.');

        return redirect(route('product.index'));
    }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   *
   * @return \Illuminate\Http\Response
   */
    public function show($id)
    {
        return view('product.show', ['product' => Product::find($id)]);
    }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   *
   * @return \Illuminate\Http\Response
   */
    public function edit($id)
    {

        return view('product.edit', [
        'product' => Product::find($id),
        'data' => Category::all(),
        ]);
    }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   *
   * @return \Illuminate\Http\Response
   */
    public function update(Request $request, $id)
    {
      dd($request);
      $product = Product::find($id);
      dd($request->hasFile('image'));


        $catId  = Category::where('name',$request->category)->firstOrFail()->id;
        $request->request->add(['category_id'=>$catId]);
        if (!$product) {
            $request->session()->flash('error', 'You can not edit this product.');
            return redirect(route('product.index'));
        }
        if($request->image){
          $path = public_path().'/storage/uploads';
          $file = $request->image;
          $filename = $file->getClientOriginalName();
          $file->move($path, $filename);
          $product->update(['image'=>$filename]);
//          dd($path);
//          $imagePath = $request['image']->store('uploads', 'public');
//          $image = Image::make(public_path("storage/{$imagePath}"))
//            ->fit(250, 250);
//          $image->save();
//          $request->request->add(['image'=>$imagePath]);
//          $product->update($request->all());

        }else{
          $product->update($request->except('image'));
        }


        $request->session()
        ->flash('success', 'The Product is edited successfully.');

        return redirect(route('product.index'));
    }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   *
   * @return \Illuminate\Http\Response
   */
    public function destroy($id, Request $request)
    {
        Product::destroy($id);
        $request->session()
        ->flash('success', 'The product is deleted successfully.');
        return redirect(route('product.index'));
    }
}
