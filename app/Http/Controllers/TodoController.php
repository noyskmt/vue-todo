<?php

namespace App\Http\Controllers;

use App\Models\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
// use Illuminate\Support\Facades\Log;

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
    // log::debug('st');
    // log::debug($request);

    $todo = new Todo();
    $id = Auth::id();

    // $request->validate([
    //   'body' => 'required | max:15',
    // ],[
    //   'body.required' => 'bodyは必須です',
    //   'body.max' => '15文字以内でご入力ください', 
    // ]);

    $todo->name = $request->name;
    $todo->id = Auth::id();
    
    $todo->save();

    // return Inertia::render('/todos',['todos' => $todo]);
    return $this->redirect_top();
    // return Inertia::render('/todos')->with('todos', $todo);
    // return view('Todos/Index')->with(['todo' => $todo]);
    // return Inertia::render('Todos/Index')->with('todos',$todo);
    // return view('/todos/store')->with('todo', $todo);

  }

  public function edit($id) {
    $todo = Todo::find($id);
    return Inertia::render('Todos/Edit', [
      'todo' => $todo,
    ]);
    // return view('todos.edit')->with('todo',$todo);
  }

  public function redirect_top() {
    return redirect('/todos');
  }

}


