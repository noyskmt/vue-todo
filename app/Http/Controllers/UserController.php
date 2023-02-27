<?php

namespace App\Http\Controllers;

use App\Models\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
  public function index()
  {

    return Inertia::render('User/Index',['users' => User::all()]);
    // $adminUser = $this->userService->admin()->first();
    // $adminUser = app()->make('adminAccountService')->admin();
    // return response()->json($adminUser);

    // return Inertia::render('Admin', [
    //   'adminUser' => $adminUser
    // ]);
  }
}
