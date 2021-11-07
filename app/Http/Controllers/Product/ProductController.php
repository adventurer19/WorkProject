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
use mysql_xdevapi\Exception;

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
        $categoryName = $request->category;

        $imagePath = $request['image']->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))
        ->fit(250, 250);
        $image->save();

        $idCategory = Category::where('name', $categoryName)->first()->id;
        try {
            auth()->user()->products()->create([
            'category_id' => $idCategory,
            'name' => $request['name'],
            'category' => $request['category'],
            'description' => $request['description'],
            'image' => $imagePath,
            ]);
            $request->session()
            ->flash('success', 'You have successfully added a new product.');
        } catch (Exception $e) {
            $request->session()
            ->flash('error', 'You can not add this product.');
        }


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
    public function update(EditProductRequest $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            $request->session()->flash('error', 'You can not edit this product.');
            return redirect(route('product.index'));
        }

        $catId  = Category::where('name', $request->category)->firstOrFail()->id;

        $request->request->add(['category_id'=>$catId]);
        if (!$request->description) {
            $request->request->add(['description'=>$product->description]);
        }

        if ($request->file('image')) {
            $imagePath = $request['image']->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))
            ->fit(250, 250);
            $image->save();
            $request->request->add(['image'=>$imagePath]);

            $product->update($request->input());
        } else {
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
        try {
            Product::destroy($id);
            $request->session()
            ->flash('success', 'The product is deleted successfully.');
        } catch (Exception $e) {
            $request->session()
            ->flash('alert', 'The product can not  deleted successfully.');
        }

        return redirect(route('product.index'));
    }
}
