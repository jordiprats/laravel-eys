<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $user = Auth::user();
    return view('home')
            ->with('activetickets', $user->activetickets)
            ->with('pendingtickets', $user->pendingtickets)
            ->with('closedtickets', $user->closedtickets)
            ->with('teams', $user->teams);
  }
}
