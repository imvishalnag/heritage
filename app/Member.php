<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;

        protected $guard = 'member';
        protected $table = 'members';

        protected $fillable = [
            'username', 'name', 'email', 'phone', 'password'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
