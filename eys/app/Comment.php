<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $guarded = [];

  public function author()
  {
    return $this->belongsTo(User::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function ticket()
  {
      return $this->belongsTo(Ticket::class);
  }
}
