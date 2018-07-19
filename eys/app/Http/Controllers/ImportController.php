<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Team;
use App\Ticket;

class ImportController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function create()
  {
    return view('import.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, array(
      'url'        => [
                        'required',
                        'regex:/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9]\.[^\s]{2,})/u'
                      ]
    ));

    $c = curl_init($request->url);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0');

    $html = curl_exec($c);
    if (curl_error($c))
    {
      //flash data
      Session::flash('status', 'Error importing ticket');
      Session::flash('status-class', 'alert-danger');
      return redirect()->route('importer');
    }

    // Get the status code
    $status = curl_getinfo($c, CURLINFO_HTTP_CODE);
    curl_close($c);

    $ticket_json = json_decode($html);

    $team = Team::where(['name' => $ticket_json->ticket->team])->first();

    if(!$team)
    {
      $team = Team::create(["name" => $ticket_json->ticket->team]);
    }

    $ticket = Ticket::where(['subject' => $ticket_json->ticket->subject])->first();

    $startup_cmd = (property_exists($ticket_json->ticket, 'startup_cmd'))?$ticket_json->ticket->startup:null;
    $stop_cmd = (property_exists($ticket_json->ticket, 'stop_cmd'))?$ticket_json->ticket->stop_cmd:null;
    $login_cmd = (property_exists($ticket_json->ticket, 'login_cmd'))?$ticket_json->ticket->login_cmd:null;
    $extra_info = (property_exists($ticket_json->ticket, 'extra_info'))?$ticket_json->ticket->extra_info:null;

    if($ticket)
    {
      $ticket->team_id = $team->id;
      $ticket->subject = $ticket_json->ticket->subject;
      $ticket->description = $ticket_json->ticket->description;
      $ticket->visibility = $ticket_json->ticket->visibility;
      $ticket->startup_cmd = $startup_cmd;
      $ticket->stop_cmd = $stop_cmd;
      $ticket->login_cmd = $login_cmd;
      $ticket->extra_info = $extra_info;

      $ticket->save();

      Session::flash('status', 'Ticket updated');
      Session::flash('status-class', 'alert-info');
    }
    else
    {
      $ticket = Ticket::create([
                                'user_id' => Auth::user()->id,
                                'team_id' => $team->id,
                                'subject' => $ticket_json->ticket->subject,
                                'description' => $ticket_json->ticket->description,
                                'visibility' => $ticket_json->ticket->visibility,
                                'startup_cmd' => $startup_cmd,
                                'stop_cmd' => $stop_cmd,
                                'login_cmd' => $login_cmd,
                                'extra_info' => $extra_info,
                              ]);

      Session::flash('status', 'Ticket imported');
      Session::flash('status-class', 'alert-info');
    }

    return redirect()->route('importer');
  }
}
