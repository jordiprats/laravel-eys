<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $guarded = [];

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function ticket()
  {
      return $this->belongsTo(Ticket::class);
  }
}
