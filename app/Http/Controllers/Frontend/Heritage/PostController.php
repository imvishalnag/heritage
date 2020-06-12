<?php

namespace App\Http\Controllers\Frontend\Heritage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $heritage_explorer  = DB::table('heritage')->distinct()->orderBy('year', 'desc')->paginate(18, 'year');
        return view('frontend.pages.heritage', ['heritage_explorer' => $heritage_explorer]);
    }

    public function indexSingle($id)
    {
    	$id = decrypt($id);

        $heritage_explorer          = DB::table('heritage')->distinct()->orderBy('year', 'desc')->take(10)->get(['year']);
        $heritage_explorer_monthly  = DB::table('heritage')->where('year', $id)->orderBy('id', 'desc')->get();

        return view('frontend.pages.heritage_detail', ['heritage_explorer_monthly' => $heritage_explorer_monthly, 'heritage_explorer' => $heritage_explorer]);
    }

     public function indexSinglePdf($file)
    {
        $file_address   = "assets/heritage/" . $file;
        return response()->file($file_address);
    }
}