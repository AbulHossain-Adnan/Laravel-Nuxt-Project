<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return response()->json($todos);
    }
    
    public function store(Request $request) {
        $file =  $request->file->getClientOriginalName();

        return response()->json($file);

       
    // $todo['content'] = $request->content;
    // $todo['is_done'] = false;
    // $todo = Todo::create($todo);
    // return response()->json($todo);

    }

    public function update(Request $request,Todo $todo) {
       $todo->is_done = !$todo->is_done;
       $todo->save();
       return response()->json($todo);
    }

    public function destroy(Todo $todo) {

        $todo->delete();
        return response()->json(true);
    }
}
