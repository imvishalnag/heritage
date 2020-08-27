<?php

namespace App\Http\Controllers\Auth\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
class PostController extends Controller
{
    public function index(){
        return view('admin.auth.member.show');
    }
    public function get()
    {
        $query = Member::orderBy('created_at', 'DESC');
        return datatables()->of($query->get())
        ->addIndexColumn()
        ->make(true);
    }
}
