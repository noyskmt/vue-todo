<?php

namespace App\Http\Controllers;

use App\Models\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Todo;

class TodoController extends Controller
{
  public function index()
  {

    return Inertia::render('Todos/Index',['create_todos' => Todo::all()]);
    
  }
}
