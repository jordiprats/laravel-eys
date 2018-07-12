<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function subtickets()
  {
    return $this->hasMany(Ticket::class);
  }
}
