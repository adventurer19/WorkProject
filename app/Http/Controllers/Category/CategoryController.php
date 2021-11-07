<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
    public function index()
    {


        return view('category.index', ['data' => Category::paginate(10)]);
    }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
    public function create()
    {

        return view('category.create');
    }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   *
   * @return \Illuminate\Http\Response
   */
    public function store(Request $request)
    {

      //dd($request);
        $request->validate([
        'category' => 'required|alpha|unique:categories,name',
        ]);

        $category = Category::create([
        'user_id' => auth()->user()->id,
        'name' => $request->category,
        ]);
        return redirect(route('category.index'));
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
      //
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


        return view('category.edit', ['category' => Category::find($id)]);
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
        $request->validate([
        'category' => 'required|alpha|unique:categories,name',
        ]);
        $category = Category::find($id);

        if (!$category) {
            $request->session()->flash('error', 'You can not edit this category.');
            return redirect(route('category.index'));
        }
        $category->update([
        'name' => $request->category,
        ]);

        $request->session()
        ->flash('success', 'The category is edited successfully.');


        return redirect(route('category.index'));
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
        Category::destroy($id);
        $request->session()
        ->flash('success', 'The product is deleted successfully.');
        return redirect(route('category.index'));
    }
}
