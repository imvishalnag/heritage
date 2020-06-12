<?php

namespace App\Http\Controllers\Frontend\Magazine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $magazine  = DB::table('magazine')->paginate(12);

        return view('frontend.pages.magazine', ['magazine' => $magazine]);
    } 
}