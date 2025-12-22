<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/** @method bool isAdmin() */
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];

    public function testimonis()
    {
        return $this->hasMany(Testimoni::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
