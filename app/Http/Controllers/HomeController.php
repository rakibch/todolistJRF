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
        return view('home');
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
}
