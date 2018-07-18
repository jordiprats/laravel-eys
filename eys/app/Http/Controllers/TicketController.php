<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Ticket;

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
      return redirect()->route('dashboard');
    }

    $user->activetickets()->attach($id);

    //flash data
    Session::flash('status', 'Ticket assigned');
    Session::flash('status-class', 'alert-success');

    //redirect
    return redirect()->route('dashboard');
  }

  public function releaseOwnership($id)
  {
    $user = Auth::user();

    $user->activetickets()->detach($id);

    //flash data
    Session::flash('status', 'Ticket released');
    Session::flash('status-class', 'alert-info');

    //redirect
    return redirect()->route('dashboard');
  }

  public function show($id)
  {
    $user = Auth::user();
    $ticket = Ticket::find($id);

    return view('tickets.show')
            ->with('user', $user)
            ->with('ticket', $ticket);
  }

  public function index(Request $request)
  {
    $tickets=Ticket::paginate(10);
    return view('tickets.list',compact('tickets'))->with('i', ($request->input('page', 1) - 1) * 10);
  }

}
