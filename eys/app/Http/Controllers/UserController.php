<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;
use Auth;
use Session;

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

  public function show($id)
  {
    return $this->edit($id);
  }

  public function edit($id)
  {
    $is_admin=Auth::user()->roles->contains('name','Admin');

    if($is_admin || Auth::user()->id==$id)
    {
      $user = User::find($id);

      return view('users.edit')
              ->with('user', $user)
              ->with('all_teams', Team::pluck('name', 'id')->all())
              ->with('user_teams', $user->teams->pluck('id'));
    }
    else
    {
      abort(403, 'Unauthorized action');
    }
  }

  public function update(Request $request)
  {
    //validate
    $this->validate($request, array(
      'name'        => 'string|max:255|required',
      'teams'       => 'required',
    ));

    $user = Auth::user();
    $user->name=$request->name;
    $user->save();

    foreach($request->teams as $team_id)
    {
      $user->teams()->attach($team_id);
    }

    //flash data
    Session::flash('status', 'Profile updated!');
    Session::flash('status-class', 'alert-success');

    //redirect
    return $this->edit($user->id);
  }
}
