<?php

namespace App\Http\Controllers\Frontend\CurrentIssue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $current_issue  = DB::table('current_issue')->orderBy('id', 'desc')->paginate(9);
        return view('frontend.pages.currentissue', ['current_issue' => $current_issue]);
    }

    public function indexSingle($id)
    {
        $current_issue_list  = DB::table('current_issue')->orderBy('id', 'desc')->take(5)->get();

    	$id = decrypt($id);
    	$current_issue = DB::table('current_issue')->where('id', $id)->get();

    	return view('frontend.pages.currentissue_detail', ['current_issue' => $current_issue, 'current_issue_list' => $current_issue_list]);
    }
}