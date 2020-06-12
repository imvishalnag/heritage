<?php

namespace App\Http\Controllers\Auth\YoutubeVideo;

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
        return view('admin.auth.youtubevideo.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'code'        => 'required|size:11|max:11',
            'heading'     => "required|max:50",
            'file'        => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/youtubevideo/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/youtubevideo/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('video')->insert(
                [
                    'heading'    => $request->input('heading'),
                    'video'      => $request->input('code'),
                    'file'       => $file_name,
                    'date'       => $date_i,
                    "created_at" =>  \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Video added successfully</p>');

        } else
            return redirect()->back()->with('msg', '<p class="text-danger">Please upload image!</p>');
    }
    
    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        
        $request->validate([
            'code'        => 'required|size:11|max:11',
            'heading'     => "required|max:50",
            'file'        => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/youtubevideo/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/youtubevideo/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('video')->where('id', $id)->update(
                [
                    'heading'     => $request->input('heading'),
                    'video'       => $request->input('code'),
                    'file'        => $file_name,
                    'date'        => $date_i,
                    "updated_at"  => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Video updated successfully</p>');

        } else {
            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('video')->where('id', $id)->update(
                [
                    'heading'     => $request->input('heading'),
                    'video'       => $request->input('code'),
                    'date'        => $date_i,
                    "updated_at"  => \Carbon\Carbon::now(),
                ]
            );
            return redirect()->back()->with('msg', '<p class="text-success">Video updated successfully</p>');
        }
    }

    public function show()
    {
        return view('admin.auth.youtubevideo.show');
    }
    
    public function updateShow($id)
    {
        $youtube_video  = DB::table('video')
                        ->where('id', decrypt($id))
                        ->get();
        $code           = $youtube_video[0]->video;
        $heading        = $youtube_video[0]->heading;
        $file           = $youtube_video[0]->file;
        return view('admin.auth.youtubevideo.update', ['code' => $code, 'heading' => $heading, 'file' => $file, 'id' => $id]);
    }

    public function get(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'file',
            2 => 'heading',
            3 => 'date',
            4 => 'action',
            5 => 'code',
        );

        $totalData = DB::table('video')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $youtube_video_data = DB::table('video')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $youtube_video_data = DB::table('video')
                ->orWhere('video.file', 'LIKE', "%{$search}%")
                ->orWhere('video.video', 'LIKE', "%{$search}%")
                ->orWhere('video.heading', 'LIKE', "%{$search}%")
                ->orWhere('video.date', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('video')
                ->orWhere('video.file', 'LIKE', "%{$search}%")
                ->orWhere('video.video', 'LIKE', "%{$search}%")
                ->orWhere('video.heading', 'LIKE', "%{$search}%")
                ->orWhere('video.date', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($youtube_video_data)) {

            $cnt = 1;

            foreach ($youtube_video_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning\" href=\"" . route('youtube_video.update_view', ['id' => encrypt($single_data->id)]) . "\" style=\"margin-right: 10px;\">Update</a><a class=\"btn btn-danger\" href=\"" . route('youtube_video.delete', ['id' => encrypt($single_data->id)]) . "\">Delete</a>";

                $file                  = "";
                $file                  = "<a class=\"publication_file\" href='#' data-videourl=\"https://www.youtube.com/watch?v=".$single_data->video."\"><img src=\"../../assets/youtubevideo/thumbnail/".$single_data->file."\"><i class=\"fa fa-play\"></i></a>";

                $nestedData['id']       = $cnt;
                $nestedData['file']     = $file;
                $nestedData['heading']  = $single_data->heading;
                $nestedData['code']     = $single_data->video;
                $nestedData['date']     = $single_data->date;
                $nestedData['action']   = $action;

                $data[]                 = $nestedData;

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

    public function delete($id)
    {
        
        $id = decrypt($id);

        $publication = DB::table('video')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/youtubevideo/" . $publication[0]->file))) {
            File::delete(public_path("assets/youtubevideo/" . $publication[0]->file));
        }

        if(file_exists(public_path("assets/youtubevideo/thumbnail/" . $publication[0]->file))) {
            File::delete(public_path("assets/youtubevideo/thumbnail/" . $publication[0]->file));
        }

        DB::table('video')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}