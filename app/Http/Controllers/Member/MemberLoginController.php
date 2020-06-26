<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
class MemberLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:member')->except('logout');
    }

    public function showMemberLoginForm(){
        return view('frontend.pages.login', ['url' => 'member']);
    }

    public function memberLogin(Request $request){
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('member')->attempt(['username' => $request->username, 'password' => $request->password])) {
            if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->intended('/home');
        }
        return back()->withInput($request->only('email', 'remember'))->with('error','Username or password is incorrect!');
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect()->route('member.login');
    }
}
