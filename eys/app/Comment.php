<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function author()
  {
    return $this->belongsTo(User::class);
  }

  public function ticket()
  {
      return $this->belongsTo(Ticket::class);
  }
}
