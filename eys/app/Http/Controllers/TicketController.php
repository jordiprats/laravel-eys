<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class TicketController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function takeOwnership($id)
  {
    $user = Auth::user();

    if($user->activetickets()->find($id))
    {
      //flash data
      Session::flash('status', 'Ticket already assigned');
      Session::flash('status-class', 'alert-danger');

      //redirect
      return redirect()->route('home');
    }

    $user->activetickets()->attach($id);

    //flash data
    Session::flash('status', 'Ticket assigned');
    Session::flash('status-class', 'alert-success');

    //redirect
    return redirect()->route('home');
  }

  public function releaseOwnership($id)
  {
    $user = Auth::user();

    $user->activetickets()->detach($id);

    //flash data
    Session::flash('status', 'Ticket released');
    Session::flash('status-class', 'alert-info');

    //redirect
    return redirect()->route('home');
  }

}
