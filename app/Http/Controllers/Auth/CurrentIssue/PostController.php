<?php

namespace App\Http\Controllers\Auth\CurrentIssue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Response;
use DB;
use Carbon;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.auth.currentissue.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'file'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20000',
            'heading'      => "required|max:200",
            'description'  => "required",
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(730, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/currentissue/" . $file_name));
            
            $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/currentissue/frontendthumbnail/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/currentissue/thumbnail/" . $file_name));

            $date_i  = now();
            $day     = date('d', strtotime($date_i));
            $month   = date('F', strtotime($date_i));
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('current_issue')->insert(
                [
                    'heading'      => $request->input('heading'),
                    'description'  => $request->input('description'),
                    'day'          => $day,
                    'month'        => $month,
                    'file'         => $file_name,
                    'date'         => $date_i,
                    "created_at" =>  \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Data uploaded successfully</p>');

        } else
            return redirect()->back()->with('msg', '<p class="text-danger">Please upload image!</p>');
    }

    public function show()
    {
        return view('admin.auth.currentissue.show');
    }

    public function updateShow($id)
    {
        $current_issue = DB::table('current_issue')
                        ->where('id', decrypt($id))
                        ->get();
        $heading        = $current_issue[0]->heading;
        $file           = $current_issue[0]->file;
        $description    = $current_issue[0]->description;
        $id             = $current_issue[0]->id;
        return view('admin.auth.currentissue.update', ['heading' => $heading, 'id' => $id, 'file' => $file, 'description' => $description]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'file'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000',
            'heading'      => "required|max:200",
            'description'  => "required",
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(730, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/currentissue/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/currentissue/thumbnail/" . $file_name));

            $date_i  = now();
            $day     = date('d', strtotime($date_i));
            $month   = date('m', strtotime($date_i));
            $date_i  = date('m/d/Y', strtotime($date_i));

            $current_issue = DB::table('current_issue')
            ->where('id', decrypt($id))
            ->get();

            DB::table('current_issue')->where('id', decrypt($id))->update(
                [
                    'heading'      => $request->input('heading'),
                    'description'  => $request->input('description'),
                    'day'          => $day,
                    'month'        => $month,
                    'file'         => $file_name,
                    'date'         => $date_i,
                    'updated_at'   => now(),
                ]
            );

        if(file_exists(public_path("assets/currentissue/" . $current_issue[0]->file))) {
            File::delete(public_path("assets/currentissue/" . $current_issue[0]->file));
        }

        if(file_exists(public_path("assets/currentissue/thumbnail/" . $current_issue[0]->file))) {
            File::delete(public_path("assets/currentissue/thumbnail/" . $current_issue[0]->file));
        }

            return redirect()->back()->with('msg', '<p class="text-success">Data updated successfully</p>');

        } else {

            $date_i  = now();
            $day     = date('d', strtotime($date_i));
            $month   = date('m', strtotime($date_i));
            $date_i  = date('m/d/Y', strtotime($date_i));

            $dd = DB::table('current_issue')->where('id', decrypt($id))->update(
                [
                    'heading'      => $request->input('heading'),
                    'description'  => $request->input('description'),
                    'day'          => $day,
                    'month'        => $month,
                    'date'         => $date_i,
                    'updated_at'   => now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Data updated successfully</p>');
        }
    }

    public function get(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'file',
            2 => 'heading',
            3 => 'description',
            4 => 'date',
            5 => 'action',
        );

        $totalData = DB::table('current_issue')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $currentissue_data = DB::table('current_issue')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $currentissue_data = DB::table('current_issue')
                ->orWhere('current_issue.file', 'LIKE', "%{$search}%")
                ->orWhere('current_issue.heading', 'LIKE', "%{$search}%")
                ->orWhere('current_issue.description', 'LIKE', "%{$search}%")
                ->orWhere('current_issue.date', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('current_issue')
                ->orWhere('current_issue.file', 'LIKE', "%{$search}%")
                ->orWhere('current_issue.heading', 'LIKE', "%{$search}%")
                ->orWhere('current_issue.description', 'LIKE', "%{$search}%")
                ->orWhere('current_issue.date', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($currentissue_data)) {

            $cnt = 1;

            foreach ($currentissue_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning\" href=\"" . route('current_issue.update_view', ['id' => encrypt($single_data->id)]) . "\" style=\"margin-right: 10px;\">Update</a><a class=\"btn btn-danger\" href=\"" . route('current_issue.delete', ['id' => $single_data->id]) . "\">Delete</a>";

                $file   = "";
                $file   = "<a class=\"publication_file\" href=\"" . route('current_issue.single_view', ['id' => $single_data->id]) . "\" target='_blank'><img src=\"../../assets/currentissue/thumbnail/".$single_data->file."\"><i class=\"fa fa-share-square\"></i></a>";

                if(strlen($single_data->description) > 40) {
                    $description = substr($single_data->description, 0, 40)."...";
                } else {
                    $description = $single_data->description;
                }

                if(strlen($single_data->heading) > 30) {
                    $heading = substr($single_data->heading, 0, 30)."...";
                } else {
                    $heading = $single_data->heading;
                }

                $nestedData['id']           = $cnt;
                $nestedData['file']         = $file;
                $nestedData['heading']      = $heading;
                $nestedData['description']  = $description;
                $nestedData['date']         = $single_data->date;
                $nestedData['action']       = $action;

                $data[]                     = $nestedData;

                $cnt++;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        print json_encode($json_data);
    }

    public function singleView($id)
    {
        $currentissue_single_data = DB::table('current_issue')
                                  ->where('id', $id)
                                  ->get();
        $heading     = $currentissue_single_data[0]->heading;
        $description = $currentissue_single_data[0]->description;
        $date        = $currentissue_single_data[0]->date;
        $file        = $currentissue_single_data[0]->file;
        
        return view('admin.auth.currentissue.singleView',['heading' => $heading, 'description' => $description, 'date' => $date, 'image' => $file]);
    }

    public function delete($id)
    {

        $current_issue = DB::table('current_issue')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/currentissue/" . $current_issue[0]->file))) {
            File::delete(public_path("assets/currentissue/" . $current_issue[0]->file));
        }

        if(file_exists(public_path("assets/currentissue/thumbnail/" . $current_issue[0]->file))) {
            File::delete(public_path("assets/currentissue/thumbnail/" . $current_issue[0]->file));
        }
        
        if(file_exists(public_path("assets/currentissue/frontendthumbnail/" . $current_issue[0]->file))) {
            File::delete(public_path("assets/currentissue/frontendthumbnail/" . $current_issue[0]->file));
        }

        DB::table('current_issue')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}