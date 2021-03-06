<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Optimus\Optimus;
use Auth;

class Ticket extends Model
{
  protected $guarded = [];

  public function getTicketID()
  {
    $hashids = new \Jenssegers\Optimus\Optimus(1580030173, 59260789, 1163945558);
    return $hashids->encode($this->id);
  }

  public function comments()
  {
    return $this->hasMany(Comment::class)->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc');
  }

  public function allcomments()
  {
    return $this->hasMany(Comment::class, 'comment_id')->orderBy('created_at', 'desc');
  }

  public function subtickets()
  {
    return $this->hasMany(Ticket::class);
  }

  public function author()
  {
    return $this->belongsTo(User::class);
  }

  public function team()
  {
    return $this->belongsTo(Team::class);
  }

  public function owners()
  {
      return $this->belongsToMany(User::class)->withTimestamps();
  }
}
