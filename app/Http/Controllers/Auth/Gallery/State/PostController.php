<?php

namespace App\Http\Controllers\Auth\Gallery\State;

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
        return view('admin.auth.gallery.state.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'file'         => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'state'        => "required",
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = $request->input('state') . ".jpg";
            $file_name    = str_replace(' ', '', $file_name);

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/state/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/state/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            $check_state = DB::table('state_gallery_cover')
                         ->where('state', $request->input('state'))
                         ->count();

            if ($check_state > 0) {
                DB::table('state_gallery_cover')->where('state', $request->input('state'))->update(
                    [
                        'state'      => $request->input('state'),
                        'file'       => $file_name,
                        'date'       => $date_i,
                        "updated_at" => \Carbon\Carbon::now(),
                    ]
                );
            } else {
                DB::table('state_gallery_cover')->insert(
                    [
                        'state'      => $request->input('state'),
                        'file'       => $file_name,
                        'date'       => $date_i,
                        "created_at" =>  \Carbon\Carbon::now(),
                        "updated_at" => \Carbon\Carbon::now(),
                    ]
                );
            }

            return redirect()->back()->with('msg', '<p class="text-success">Image uploaded successfully</p>');

        } else
            return redirect()->back()->with('msg', '<p class="text-danger">Please upload image!</p>');
    }

    public function show()
    {
        return view('admin.auth.gallery.state.show');
    }

    public function get(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'file',
            2 => 'state',
            3 => 'date',
            4 => 'action',
        );

        $totalData = DB::table('state_gallery_cover')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $gallery_state_data = DB::table('state_gallery_cover')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $gallery_state_data = DB::table('state_gallery_cover')
                ->orWhere('state_gallery_cover.file', 'LIKE', "%{$search}%")
                ->orWhere('state_gallery_cover.state', 'LIKE', "%{$search}%")
                ->orWhere('state_gallery_cover.date', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('state_gallery_cover')
                ->orWhere('state_gallery_cover.file', 'LIKE', "%{$search}%")
                ->orWhere('state_gallery_cover.state', 'LIKE', "%{$search}%")
                ->orWhere('state_gallery_cover.date', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($gallery_state_data)) {

            $cnt = 1;

            foreach ($gallery_state_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning\" href=\"" . route('gallery.state.upload-view', ['id' => $single_data->id]) . "\">Update</a>";

                $file                  = "";
                $file                  = "<a class=\"publication_file\" href='../../../assets/gallery/state/".$single_data->file."' target='_blank'><img src=\"../../../assets/gallery/state/thumbnail/".$single_data->file."\"><i class=\"fa fa-share-square\"></i></a>";

                $nestedData['id']       = $cnt;
                $nestedData['file']     = $file;
                $nestedData['state']    = $single_data->state;
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

        $publication = DB::table('state_gallery_cover')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/gallery/state/" . $publication[0]->file))) {
            File::delete(public_path("assets/gallery/state/" . $publication[0]->file));
        }

        if(file_exists(public_path("assets/gallery/state/thumbnail/" . $publication[0]->file))) {
            File::delete(public_path("assets/gallery/state/thumbnail/" . $publication[0]->file));
        }

        DB::table('state_gallery_cover')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}