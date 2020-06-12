<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $heritage_count             = DB::table('heritage')->count();
        $publication_count          = DB::table('publication')->count();
        $current_issue_count        = DB::table('current_issue')->count();
        $gallery_state_count        = DB::table('state_gallery_cover')->count();
        $gallery_tribe_count        = DB::table('tribe_gallery_cover')->count();
        $gallery_individual_count   = DB::table('individual_gallery')->count();
        $folk_tales_count           = DB::table('folk_tales')->count();
        $youtube_video_count        = DB::table('video')->count();
        $events_cover_count         = DB::table('events_cover')->count();
        $events_individual_count    = DB::table('individual_events_gallery')->count();
        $magazine_count             = DB::table('magazine')->count();
        
        return view('admin.auth.home.home',[
            'heritage_count'            => $heritage_count,
            'publication_count'         => $publication_count,
            'current_issue_count'       => $current_issue_count,
            'gallery_state_count'       => $gallery_state_count,
            'gallery_tribe_count'       => $gallery_tribe_count,
            'gallery_individual_count'  => $gallery_individual_count,
            'folk_tales_count'          => $folk_tales_count,
            'youtube_video_count'       => $youtube_video_count,
            'events_cover_count'        => $events_cover_count,
            'events_individual_count'   => $events_individual_count,
            'magazine_count'            => $magazine_count,
            ]);
    }
}
