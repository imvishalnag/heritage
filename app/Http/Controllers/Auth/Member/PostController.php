<?php

namespace App\Http\Controllers\Auth\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.auth.member.show');
    }
    public function get()
    {
        $query = Member::orderBy('created_at', 'DESC');
        return datatables()->of($query->get())
            ->addIndexColumn()
            ->addColumn('change_password', function ($row) {
                return '<a class="btn btn-primary btn-sm" href=' . route('member.change_password', $row) . '>Change Password</a>';
            })
            ->rawColumns(['change_password'])
            ->make(true);
    }

    public function changePassword($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.auth.member.change_password', compact('member'));
    }

    public function doChangePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:8|same:confirm_password',
        ]);
        $id = $request->input('id');
        $member = Member::findOrFail($id);
        $member->password = Hash::make($request->input('password'));
        if($member->save()){
            return redirect()->back()->with('msg', 'Password Changed successfully');
        }else {
            return redirect()->back()->with('msg', 'Something went wrong!');
        }
    }
}
