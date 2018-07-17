<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  protected $guarded = [];
  
  public function tickets()
  {
    return $this->hasMany(Ticket::class);
  }

  public function users()
  {
      return $this->belongsToMany(User::class)->withTimestamps();
  }
}
