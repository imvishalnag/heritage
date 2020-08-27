<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanSubscriptions extends Model
{
    protected $table = 'plan_subscriptions';
    protected $fillable = ['user_type', 'user_id', 'plan_id', 'description', 'trial_ends_at', 'starts_at', 'ends_at', 'cancels_at', 'canceled_at', 'timezone'];

    public function user()
    {
        return $this->belongsTo('App\Member', 'user_id', 'id');
    }

    public function plan()
    {
        return $this->belongsTo('App\Plan', 'plan_id', 'id');
    }
}
