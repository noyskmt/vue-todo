<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Todo;
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

    $todo->name = $request->name;
    $todo->save();
  }

  public function destroy($id) {
    Todo::find($id)->delete();
  }

  public function redirect_top() {
    return Inertia::render('Todos/Index',['todos' => Todo::latest()->get()]);
  }

}


