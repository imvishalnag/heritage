<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $current_issue  	= DB::table('current_issue')->take(10)->get();
        $heritage_explorer  = DB::table('heritage')->distinct()->orderBy('year', 'desc')->take(10)->get(['year']);
        $publication        = DB::table('publication')->orderBy('id', 'desc')->take(3)->get();
        $magazine           = DB::table('magazine')->orderBy('id', 'desc')->take(3)->get();

        return view('frontend.pages.index', ['current_issue' => $current_issue, 'heritage_explorer' => $heritage_explorer, 'publication' => $publication, 'magazine' => $magazine]);
    }
}