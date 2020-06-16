<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Rinvex\Subscriptions\Traits\HasSubscriptions;

class Member extends Authenticatable
{
    use Notifiable;
    use HasSubscriptions;

        protected $guard = 'member';
        protected $table = 'members';

        protected $fillable = [
            'username', 'name', 'email', 'phone', 'password'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
