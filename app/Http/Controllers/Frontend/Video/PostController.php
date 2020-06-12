<?php

namespace App\Http\Controllers\Frontend\Video;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $youtubevideo  = DB::table('video')->orderBy('id', 'desc')->paginate(12);
        return view('frontend.pages.video', ['youtubevideo' => $youtubevideo]);
    }
}