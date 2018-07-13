<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $users=User::paginate(10);
    return view('users.list',compact('users'))->with('i', ($request->input('page', 1) - 1) * 10);
  }

  public function edit($id)
  {
    $is_admin=Auth::user()->roles->contains('name','Admin');

    if($is_admin || Auth::user()->id==$id)
    {
      $user = User::find($id);
      return "hola";
    }
    else
    {
      abort(403, 'Unauthorized action');
    }
  }
}
