<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\todoTaskList;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $categories = categories::all();
        return view('home')->with(['categories'=>$categories]);
    }

    public function addCategory(Request $request)
    {
        $categoryName = $request->categoryName;       
        categories::create([
            'categoryName' => $categoryName,
        ]);
        Session::put('msg', 'Successfully Saved Category Data');
        return response()->json(['success'=>'Successfully Saved Category Data']);
        
    }

    public function deleteCategory(Request $request)
    {
        $id = $request->categoryId;
        categories::find($id)->delete();
        Session::put('msg', 'Successfully Deleted Category Data');
        return response()->json(['success'=>'Successfully Deleted Category Data']);
    }
}
