<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        /** screnario with recent */
        $categories = Category::all();
        $product = $request->product;
        $categoryName = $request->category;
        $categoryId= Category::where('name',$categoryName)->first()->id ?? null;
        if($request->last){

            $data = Product::latest()->take(5)->get();
            return view('public.list.list',['data'=>$data],['categories'=>$categories]);
        }

        $request->validate([
            'name'=>'alpha',
            'category'=>'required'
        ]);

        /** scenario only with product and category */
        if($request->product && $request->category){

            $data = Product::where('name',$product)->where('category_id',$categoryId)->get();

            return view('public.list.list',['data'=>$data],['categories'=>$categories]);
        }
        /** scenario only with category */
        else if(!($request->product)){


            $data = Product::where('category_id',$categoryId)->get();
            return view('public.list.list',['data'=>$data],['categories'=>Category::all()]);

        }
        /** scenario only with product */
        else if(!$request->category)
        {

            $data = DB::table('products')->where('name','like', '%'.$product)->get();

            return view('public.list.list',['data'=>$data],['categories'=>Category::all()]);

        }



        return view('public.index',['categories'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $categories = Category::all();
        return view('public.list.show',['product'=>Product::find($id),'show'=>'show'],['categories'=>$categories]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
