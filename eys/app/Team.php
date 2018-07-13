<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  public function tickets()
  {
    return $this->hasMany(Ticket::class);
  }
}
