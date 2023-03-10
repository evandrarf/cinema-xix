<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Authenticate extends Controller
{
  //
  public function register(Request $request)
  {

    $request->merge(["role" => 'user']);
    $request->validate([
      'name' => 'required|string',
      'role' => 'required|in:admin,user',
      'username' => 'required|string',
      'password' => 'required|string',
    ]);

    $user = new User([
      'name' => $request->name,
      'role' => $request->role,
      'username' => $request->username,
      'password' => Hash::make($request->password),
    ]);

    $user->save();

    return to_route('login')->with('success', 'User created successfully');
  }

  public function login(Request $request)
  {
    $request->validate([
      'username' => 'required|string',
      'password' => 'required|string',
    ]);

    if (!auth()->attempt($request->only('username', 'password'))) {
      return view('auth.login')->with('error', 'Invalid login details');
    } else {
      return to_route('dashboard.index');
    }
  }

  public function logout()
  {
    auth()->logout();

    return to_route('login');
  }
}
