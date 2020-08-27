<?php

namespace App\Http\Controllers\Auth\MemberSubscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\PlanSubscriptions;
use App\Plan;
use App\Member;
use Carbon\Carbon;
class PostController extends Controller
{
    public function index()
    {
        return view('admin.auth.member_subscription.index');
    }
    public function get()
    {
        $query = PlanSubscriptions::orderBy('created_at', 'DESC');
        return datatables()->of($query->get())
        ->addIndexColumn()
        ->addColumn('user_name', function($row){
            $user_name = Member::find($row->user_id);
            return $user_name->name;
        })
        ->addColumn('plan_name', function($row){
           $plan_name = Plan::find($row->plan_id);
           return $plan_name->name;
        })
        ->addColumn('expire_status', function($row){
            $now = Carbon::now();
            $start_date = $row->starts_at;
            $end_date = $row->ends_at;

            if($now->between($start_date,$end_date)){
                return '1'; //Running
            } else {
                return '2'; //Expire
            }
        })
        ->addColumn('remaining_days', function($row){
            $ends_at = $row->ends_at;
            $remaining_days = Carbon::now()->diffInDays($ends_at);
            return $remaining_days;
        })
        ->rawColumns(['user_name', 'plan_name', 'expire_status', 'remaining_days'])
        ->make(true);
    }
}
