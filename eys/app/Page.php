<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  public function author()
  {
    return $this->belongsTo(User::class);
  }
}
