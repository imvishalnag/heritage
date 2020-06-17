<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Member;
use DB;
use App\Payment;
use Carbon\Carbon;
class WebController extends Controller
{
    public function membership()
    {
        $plan = DB::table('plans')->get();
        return view('frontend.pages.membership', compact('plan'));
    }

    public function beforeCheckout($id)
    {
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        $plan = DB::table('plans')->find($id);
        return view('frontend.pages.checkout', compact('plan'));
    }

    public function payNow(Request $request)
    {
        if(Auth::guard('member')->check()){
            $user = Member::find(Auth::guard('member')->id());
            if($user->subscription('main')==NULL){
                $plan_id = $request->input('plan_id');
                $plan = DB::table('plans')->find($plan_id);
                $api = new \Instamojo\Instamojo(
                    config('services.instamojo.api_key'),
                    config('services.instamojo.auth_token'),
                    config('services.instamojo.url')
                );
                try {
                    $response = $api->paymentRequestCreate(array(
                        "purpose" => $plan->name,
                        "amount" => $plan->price,
                        "buyer_name" => $user->name,
                        "send_email" => true,
                        "email" => "$user->email",
                        "phone" => "$user->phone",
                        "redirect_url" => route('pay_success', ['id' => encrypt($plan_id)])
                        ));
                        header('Location: ' . $response['longurl']);
                        exit();
                }catch (Exception $e) {
                    print('Error: ' . $e->getMessage());
                }
            }else{
                return redirect()->back()->with('error', 'You have already active plan!');
            }
        }else{
            return redirect()->route('member.login')->with('error', 'You have to login first!');
        }
    }

    public function success(Request $request, $id){
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        try {
            
           $api = new \Instamojo\Instamojo(
               config('services.instamojo.api_key'),
               config('services.instamojo.auth_token'),
               config('services.instamojo.url')
           );
    
           $response = $api->paymentRequestStatus(request('payment_request_id'));
    
           if( !isset($response['payments'][0]['status']) ) {
              dd('payment failed');
           } else if($response['payments'][0]['status'] != 'Credit') {
                dd('payment failed');
           } 
         }catch (\Exception $e) {
            dd('payment failed');
        }
        $payments = new Payment;
        $payments->payment_id = $response['payments'][0]['payment_id'];
        $payments->status = $response['payments'][0]['status'];
        $payments->currency = $response['payments'][0]['currency'];
        $payments->amount = $response['payments'][0]['amount'];
        $payments->buyer_name = $response['payments'][0]['buyer_name'];
        $payments->buyer_phone = $response['payments'][0]['buyer_phone'];
        $payments->buyer_email = $response['payments'][0]['buyer_email'];
        $payments->purpose = $response['purpose'];
        if($payments->save()){
            $user = Member::find(Auth::guard('member')->id());
            $plan = app('rinvex.subscriptions.plan')->find($id);
            $subscription = $user->newSubscription('main', $plan);
            // dd($subscription);
            $subscription_usage = DB::table('plan_subscription_usage')
                ->insert([
                    'subscription_id' => $subscription->id,
                    'valid_until' => $subscription->ends_at,
                    'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                ]);
            if($subscription){
                return redirect()->route('status_page');
            }
        }else{
            return 'error';
        }
     }

     public function statusPage(){
        $user = Member::find(Auth::guard('member')->id());
        $plans = DB::table('plans')
            ->select('plans.*', 'plan_subscriptions.plan_id', 'plan_subscriptions.starts_at', 'plan_subscriptions.ends_at', 'members.id')
            ->join('plan_subscriptions','plans.id', '=', 'plan_subscriptions.plan_id')
            ->join('members', 'members.id', '=', 'plan_subscriptions.user_id')
            ->where('members.id', Auth::guard('member')->id())->first();
        $date = Carbon::parse($plans->ends_at);
        $now = Carbon::now();
        $usage = $date->diffInDays($now);
        // Get subscriptions with period ending in 15 days
        $subscriptions = app('rinvex.subscriptions.plan_subscription')->findEndingPeriod(15)->get();
        return view('frontend.pages.thank', compact('plans', 'user', 'usage'));

     }
}
