<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutocomplateController extends Controller
{

    public function index()
    {

        return view('body.public');
    }

    public function action(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = Category::select('name')
        ->where('name', 'LIKE', '%' . $query . '%')
        ->get();

        return response()->json($filter_data);
    }
}
