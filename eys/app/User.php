<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withTimestamps();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function activetickets()
    {
        return $this->belongsToMany(Ticket::class)->withTimestamps()->wherePivot('status', 'open');
    }

    public function closedtickets()
    {
        return $this->belongsToMany(Ticket::class)->withTimestamps()->wherePivot('status', 'closed');
    }

    public function pendingtickets()
    {
        return $this->belongsToMany(Ticket::class)->withTimestamps()->wherePivot('status', 'pending');
    }

    public function alltickets()
    {
        return $this->belongsToMany(Ticket::class)->withTimestamps();
    }
}
