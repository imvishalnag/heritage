<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';
    protected $fillable = ['slug', 'name', 'description', 'is_active', 'price', 'signup_fee', 'currency', 'trial_period', 'invoice_period', 'invoice_interval', 'grace_period', 'grace_interval', 'prorate_day', 'prorate_period', 'prorate_extend_due', 'active_subscribers_limit', 'sort_order'];
    
}
