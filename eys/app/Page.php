<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  protected $guarded = [];
  
  public function author()
  {
    return $this->belongsTo(User::class);
  }
}
