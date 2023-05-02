<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Todo;

class TodoController extends Controller
{
  public function index()
  {
    return Inertia::render('Todos/Index',['todos' => Todo::latest()->get()]);
  }

  public function store(Request $request)
  {
    $todo = new Todo();
    // Log::debug($request);

    $todo->name = $request->name;
    $todo->save();
  }

  public function update(Request $request, $id) {
    Todo::find($id)->update($request->all());
  }

  public function destroy($id) {
    Todo::find($id)->delete();
  }
}


