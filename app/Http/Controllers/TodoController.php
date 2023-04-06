<?php

namespace App\Http\Controllers;

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

    return $this->redirect_top();
  }

  public function store(Request $request)
  {
    $todo = new Todo();

    $todo->name = $request->name;
    $todo->save();

    return $this->redirect_top();
  }

  public function edit($id) {
    $todo = Todo::find($id);
    return Inertia::render('Todos/Edit', [
      'todo' => $todo,
    ]);
    return view('todos.edit')->with('todo',$todo);
  }

  public function redirect_top() {
    return Inertia::render('Todos/Index',['todos' => Todo::all()]);
  }

}


