<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

//TODO category index=>name
        if($request->last)
        {
            $data = DB::table('products')->latest()->take(5)->get();
            return view('home.list',['items'=>$data,'category'=>3]);
        }
        else if($request->product && $request->category)
        {
//            dd('both options are mark');
            $categoryId= Category::where('name',$request->category)->first()->id;
            $data = DB::table('products')->where('name',$request->product)->where('category_id',$categoryId)->get();
            return view('home.list',['items'=>$data],['category'=>2]);
        }
        else if(!($request->product)){
            $categoryName = $request->category;
            $categoryId= Category::where('name',$request->category)->first()->id;
            $data = DB::table('products')->where('category_id',$categoryId)->get();

            return view('home.list',['items'=>$data,'category'=>$categoryName]);

        }
        else if(!$request->category)
        {
            $product = $request->product;
            $data = DB::table('products')->where('name','like', '%'.$product)->get();

            return view('home.list',['items'=>$data,'category'=>3]);

        }

//        $request->validate([
//            'name'=>'alpha',
//            'category'=>'required'
//        ]);

        return view('home.public',['categories'=>Category::all()]);
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
    public function show($id)
    {

        return view('home.show',['product'=>Product::find($id)]);

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
