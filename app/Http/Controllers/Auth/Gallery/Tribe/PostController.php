<?php

namespace App\Http\Controllers\Auth\Gallery\Tribe;

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
        return view('admin.auth.gallery.tribe.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'file'         => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'state'        => "required",
            'tribe'        => "required",
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = $request->input('state') . $request->input('tribe') . ".jpg";
            $file_name    = str_replace(' ', '', $file_name);

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/tribe/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/tribe/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            $check_state = DB::table('tribe_gallery_cover')
                         ->where('state', $request->input('state'))
                         ->where('tribe', $request->input('tribe'))
                         ->count();

            if ($check_state > 0) {
                DB::table('tribe_gallery_cover')->where('state', $request->input('state'))->where('tribe', $request->input('tribe'))->update(
                [
                    'state'      => $request->input('state'),
                    'tribe'      => $request->input('tribe'),
                    'file'       => $file_name,
                    'date'       => $date_i,
                    "updated_at" => \Carbon\Carbon::now(),
                ]
            );
            } else {
                DB::table('tribe_gallery_cover')->insert(
                [
                    'state'      => $request->input('state'),
                    'tribe'      => $request->input('tribe'),
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
        return view('admin.auth.gallery.tribe.show');
    }

        public function Updateshow($id)
    {
        $tribe_gallery_cover = DB::table('tribe_gallery_cover')
                        ->where('id', decrypt($id))
                        ->get();
        $state        = $tribe_gallery_cover[0]->state;
        $file         = $tribe_gallery_cover[0]->file;
        $tribe        = $tribe_gallery_cover[0]->tribe;

        if ($state == 'Arunachal Pradesh') {
            $tribes = DB::table('arunachal_pradesh_tribes')->pluck('tribe');
        }
        if ($state == 'Assam') {
            $tribes = DB::table('assam_tribes')->pluck('tribe');
        }
        if ($state == 'Manipur') {
            $tribes = DB::table('manipur_tribes')->pluck('tribe');
        }
        if ($state == 'Meghalaya') {
            $tribes = DB::table('meghalaya_tribes')->pluck('tribe');
        }
        if ($state == 'Nagaland') {
            $tribes = DB::table('nagaland_tribes')->pluck('tribe');
        }
        if ($state == 'Sikkim') {
            $tribes = DB::table('sikkim_tribes')->pluck('tribe');
        }
        if ($state == 'Tripura') {
            $tribes = DB::table('tripura_tribes')->pluck('tribe');
        }
        if ($state == 'Mizoram') {
            $tribes = DB::table('mizoram_tribes')->pluck('tribe');
        }

        $count = count($tribes);

        return view('admin.auth.gallery.tribe.update', ['file' => $file, 'id' => $id, 'state' => $state, 'tribe' => $tribe, 'tribes' => $tribes, 'count' => $count]);
    }

        public function update(Request $request, $id)
    {

        $request->validate([
            'file'         => 'image|mimes:jpeg,png,jpg,gif,svg',
            'state'        => "required",
            'tribe'        => "required",
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = $request->input('state') . $request->input('tribe') . ".jpg";
            $file_name    = str_replace(' ', '', $file_name);

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/tribe/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/tribe/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('tribe_gallery_cover')->where('id', decrypt($id))->update(
                [
                    'state'      => $request->input('state'),
                    'tribe'      => $request->input('tribe'),
                    'file'       => $file_name,
                    "updated_at" => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Data updated successfully</p>');

        } else {

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

             DB::table('tribe_gallery_cover')->where('id', decrypt($id))->update(
                [
                    'state'      => $request->input('state'),
                    'tribe'      => $request->input('tribe'),
                    "updated_at" => \Carbon\Carbon::now(),
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
            2 => 'state',
            3 => 'tribe',
            4 => 'date',
            5 => 'action',
        );

        $totalData = DB::table('tribe_gallery_cover')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $gallery_tribe_data = DB::table('tribe_gallery_cover')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $gallery_tribe_data = DB::table('tribe_gallery_cover')
                ->orWhere('tribe_gallery_cover.state', 'LIKE', "%{$search}%")
                ->orWhere('tribe_gallery_cover.tribe', 'LIKE', "%{$search}%")
                ->orWhere('tribe_gallery_cover.date', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('tribe_gallery_cover')
                ->orWhere('tribe_gallery_cover.state', 'LIKE', "%{$search}%")
                ->orWhere('tribe_gallery_cover.tribe', 'LIKE', "%{$search}%")
                ->orWhere('tribe_gallery_cover.date', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($gallery_tribe_data)) {

            $cnt = 1;

            foreach ($gallery_tribe_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning\" href=\"" . route('gallery.state.tribe.update_view', ['id' => encrypt($single_data->id)]) . "\" style=\"margin-right: 10px;\">Update</a><a class=\"btn btn-danger\" href=\"" . route('gallery.state.tribe.delete', ['id' => $single_data->id]) . "\">Delete</a>";

                $file                  = "";
                $file                  = "<a class=\"publication_file\" href='../../../../assets/gallery/tribe/".$single_data->file."' target='_blank'><img src=\"../../../../assets/gallery/tribe/thumbnail/".$single_data->file."\"><i class=\"fa fa-share-square\"></i></a>";

                $nestedData['id']       = $cnt;
                $nestedData['file']     = $file;
                $nestedData['state']    = $single_data->state;
                $nestedData['tribe']    = $single_data->tribe;
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

        $tribe_gallery_cover = DB::table('tribe_gallery_cover')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/gallery/tribe/" . $tribe_gallery_cover[0]->file))) {
            File::delete(public_path("assets/gallery/tribe/" . $tribe_gallery_cover[0]->file));
        }

        if(file_exists(public_path("assets/gallery/tribe/thumbnail/" . $tribe_gallery_cover[0]->file))) {
            File::delete(public_path("assets/gallery/tribe/thumbnail/" . $tribe_gallery_cover[0]->file));
        }

        DB::table('tribe_gallery_cover')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}