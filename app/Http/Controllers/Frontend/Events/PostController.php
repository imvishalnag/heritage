<?php

namespace App\Http\Controllers\Frontend\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $events  = DB::table('events_cover')->paginate(12);

        return view('frontend.pages.events', ['events' => $events]); 
    }

    public function indexSingle($id)
    {
    	$id 	 = decrypt($id);
        $events  = DB::table('individual_events_gallery')->where('event_id', $id)->paginate(12);

        return view('frontend.pages.events_detail', ['events' => $events]);
    }
}