<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Optimus\Optimus;
use Auth;

class Ticket extends Model
{
  protected $guarded = [];

<<<<<<< HEAD
  public function getTicketID()
  {
    return $optimus->encode($this->id);
  }

=======
>>>>>>> parent of 9b38a5b... gmp
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
