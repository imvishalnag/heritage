<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use DB;
use Auth;
use App\Member;
class PostController extends Controller
{
    public function index()
    {
        $current_issue  	= DB::table('current_issue')->take(10)->get();
        $heritage_explorer  = DB::table('heritage')->distinct()->orderBy('year', 'desc')->take(10)->get(['year']);
        $publication        = DB::table('publication')->orderBy('id', 'desc')->take(3)->get();
        $magazine           = DB::table('magazine')->orderBy('id', 'desc')->take(3)->get();
        // $user = Member::find(Auth::guard('member')->id());
        // if(Auth::guard('member')->id()){
        //     dd($user->subscription('main')->active());
        //     $plan_subscription_check = DB::table('plan_subscriptions')->where('user_id', Auth::guard('member')->id())->first();
        // }else{
        //     $plan_subscription_check = null;
        // }

        return view('frontend.pages.index', compact('current_issue', 'heritage_explorer', 'publication', 'magazine'));
    }
}