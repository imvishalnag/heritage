<?php

namespace App\Http\Controllers\Frontend\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PostController extends Controller
{
    public function index($state, $tribe)
    {
    	$state = decrypt($state);
    	$tribe = decrypt($tribe);

        $gallery_image  = DB::table('individual_gallery')->where('state', $state)->where('tribe', $tribe)->paginate(18);
        return view('frontend.pages.gallery_detail', ['gallery_image' => $gallery_image]);
    }

    public function indexState()
    {
        $gallery_image  = DB::table('state_gallery_cover')->get();
        return view('frontend.pages.gallery', ['gallery_image' => $gallery_image]);
    }

    public function indexTribe($state)
    {
    	$state = decrypt($state);

        $gallery_image  = DB::table('tribe_gallery_cover')->where('state', $state)->paginate(18);
        return view('frontend.pages.gallery_tribes', ['gallery_image' => $gallery_image]);
    }
}