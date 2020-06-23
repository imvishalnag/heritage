<?php

namespace App\Http\Controllers\Frontend\Publication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $publication  = DB::table('publication')->paginate(12);

        return view('frontend.pages.publication', ['publication' => $publication]);
    }
    
}