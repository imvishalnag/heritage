<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use Hash;
use Session;
use Auth;
class MemberRegisterController extends Controller
{
    public function showMemberRegisterForm()
    {
        return view('frontend.pages.signup');
    }

    public function registerMember(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'name'   => 'required',
            'email'   => 'required|email',
            'phone'   => 'required|numeric|min:10',
            'password'   => 'required|confirmed|min:6',
        ]);

        // UserName Check
        $username_check = Member::where('username', $request->input('username'))->count();

        if($username_check > 0){
            return back()->with('error', 'Username already exists!!! Try another');
        }

        $mobile_check = Member::where('phone', $request->input('phone'))->count();
        if($mobile_check){
            return back()->with('error', 'Mobile No already exists!!!');
        }

        $email_check = Member::where('email', $request->input('email'))->count();
        if($email_check){
            return back()->with('error', 'Email Already exists!!!');
        }

        $member = new Member;
        $member->username = $request->input('username');
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->phone = $request->input('phone');
        $member->password = Hash::make($request->input('password'));

        if($member->save()){
            if(Auth::guard('member')->attempt(['username' => $request->username, 'password' => $request->password])){
                if(Session::has('oldUrl')){
                    $oldUrl = Session::get('oldUrl');
                    Session::forget('oldUrl');
                    return redirect()->to($oldUrl);
                }
                return redirect()->route('membership');
            }
        }
    }
}
