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
