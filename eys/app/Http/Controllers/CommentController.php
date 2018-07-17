<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Ticket;
use App\Comment;

class CommentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function store(Request $request)
  {
    // validate
    $this->validate($request, array(
      'ticket_id' => 'required|integer',
      'user_id' => 'required|integer',
      'description' => 'string',
    ));

    if(Auth::user()->id != $request->user_id)
    {
      // trying to add a comment using a different user id - fuck off
      return redirect()->route('home');
    }
    else
    {
      $comment = Comment::create([
                                    'ticket_id'   => $request->ticket_id,
                                    'user_id'     => $request->user_id,
                                    'description' => $request->description,
                                  ]);
    }
  }
}
