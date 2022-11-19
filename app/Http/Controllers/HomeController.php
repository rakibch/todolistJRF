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
        $categories = categories::orderBy('categoryName','asc')->get();
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

    public function addTodoTask(Request $request)
    {
        $todoTask = $request->todoTask;
        $category = $request->category;
        todoTaskList::create([
            'categoryId' => $category,
            'todoTask' => $todoTask,
        ]);
        Session::put('msg', 'Successfully Added Todo Task');
        return response()->json(['success'=>'Successfully Added Todo Task']);
    }

    public function getTaskListbyCategory(Request $request)
    {
        $categoryId = $request->categoryId;
        if($categoryId=='all')
        {
            $getToDoList = todoTaskList::orderBy('todoTask','asc')->get();
            return view('todolist.all')->with(['getToDoList' => $getToDoList]);
        }
        else
        {
            $getToDoList = todoTaskList::where('categoryId',$categoryId)->orderBy('todoTask','asc')->get();
            return view('todolist.all')->with(['getToDoList' => $getToDoList]);
        }

    }
}
