<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  protected $redirectTo;

  public function __construct()
  {
    $this->redirectTo = route('dashboard');
    $this->middleware('guest')->except('logout');
  }
}
