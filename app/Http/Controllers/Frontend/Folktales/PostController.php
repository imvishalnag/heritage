<?php

namespace App\Http\Controllers\Frontend\Folktales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use DB;

class PostController extends Controller
{
    public function index()
    {
        return view('frontend.pages.folk_tales');
    }

    public function indexSingle($id)
    {
    	$state = decrypt($id);

        $folk_tales_state_wise  = DB::table('folk_tales')->where('state', $state)->orderBy('id', 'desc')->paginate(12);

        return view('frontend.pages.folk_tales_detail', ['folk_tales_state_wise' => $folk_tales_state_wise, 'state' => $state]);
    }

     public function indexSinglePdf($file)
    {
        $file_address   = "assets/folktales/" . $file;
        return response()->file($file_address);
    }
}