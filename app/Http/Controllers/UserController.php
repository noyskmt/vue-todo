<?php

namespace App\Http\Controllers;

use App\Models\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
  public function index()
  {

    return Inertia::render('User/Index',['users' => User::all()]);
    
  }
}
