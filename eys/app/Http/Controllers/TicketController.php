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

    $user->activetickets()->attach($id);

    //flash data
    Session::flash('status', 'Ticket assigned');
    Session::flash('status-class', 'alert-success');

    //redirect
    return redirect()->route('home');
  }

}
