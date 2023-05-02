<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Todo;
use Illuminate\Support\Facades\Log;
// use App\Http\Requests\PostRequest;
// use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
  public function index()
  {
    return $this->redirect_top();
  }

  public function store(Request $request)
  {
    $todo = new Todo();
    // Log::debug($request);

    $todo->name = $request->name;
    $todo->save();
  }

  // public function edit($id) {
  //   Todo::find($id);
  // }

  public function update(Request $request, $id) {
    $todo=Todo::find($id);
    $todo->name = $request->name;
    $todo->update($request->all());
    $todo->save();
    // Log::debug($name);
    Log::debug($id);
    Log::debug($request);

    // $todo->update($request->id);
    // $todo->name = $request->name;
    // $todo->save();
    // $id -> update($request->name);

  }

  public function destroy($id) {
    Todo::find($id)->delete();
  }

  public function redirect_top() {
    return Inertia::render('Todos/Index',['todos' => Todo::latest()->get()]);
  }
}


