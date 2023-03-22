<?php

namespace App\Http\Controllers;

use App\Models\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;

class TodoController extends Controller
{
  public function index()
  {
    $id = Auth::id();
    Todo::where('name',$id)->get();

    return Inertia::render('Todos/Index',['todos' => Todo::all()]);
  }

  public function store(Request $request)
  {
    $todo = new Todo();
    $id = Auth::id();
    $todo->body = $request->body;
    $todo->name = Auth::id();
    // $todo->title = $request->title;
    // $todo->body = $request->body;
    $todo->save();

    return Inertia::render('Todos/Index');  
  }

  public function edit($id) {
    $todo = Todo::find($id);
    return Inertia::render('Todos/Edit', [
      'todo' => $todo,
    ]);
    // return view('todos.edit')->with('todo',$todo);
}

}


