<?php

namespace App\Http\Controllers\Auth\Gallery\Individual;

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
        return view('admin.auth.gallery.individual.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'file'         => 'required',
            'state'        => "required",
            'tribe'        => "required",
            'caption'      => "max:50",
        ]);

        if ($request->hasFile('file')) {

            $allowedfileExtension=['jpg', 'jpeg','png', 'gif', 'bmp', 'JPG', 'JPEG','PNG', 'GIF', 'BMP'];

            $files = $request->file('file');

            foreach($files as $file){
                $extension = $file->getClientOriginalExtension();
                $check     = in_array($extension,$allowedfileExtension);
                if(!$check) {
                    return redirect()->back()->with('msg', '<p class="text-danger">Sorry! only jpg, jpeg, png, gif allowed</p>');
                }
            }

            foreach ($files as $file) {
                $image        = $file;
                $file_name    = time()."_".mt_rand() . ".jpg";

                $image_resize = Image::make($image->getRealPath());

                 $image_resize->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save(public_path("assets/gallery/individual/" . $file_name));

                $image_resize->resize(370, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save(public_path("assets/gallery/individual/frontendthumbnail/" . $file_name));

                $image_resize->resize(68, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save(public_path("assets/gallery/individual/thumbnail/" . $file_name));

                $date_i  = now();
                $date_i  = date('m/d/Y', strtotime($date_i));

                DB::table('individual_gallery')->insert(
                    [
                        'state'      => $request->input('state'),
                        'tribe'      => $request->input('tribe'),
                        'caption'    => $request->input('caption'),
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
        return view('admin.auth.gallery.individual.show');
    }

    public function Updateshow($id)
    {
        $gallery = DB::table('individual_gallery')
                        ->where('id', decrypt($id))
                        ->get();
        $state        = $gallery[0]->state;
        $file         = $gallery[0]->file;
        $tribe        = $gallery[0]->tribe;
        $caption      = $gallery[0]->caption;

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

        return view('admin.auth.gallery.individual.update', ['file' => $file, 'id' => $id, 'state' => $state, 'tribe' => $tribe, 'caption' => $caption, 'tribes' => $tribes, 'count' => $count]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'file'         => 'image|mimes:jpeg,png,jpg,gif,svg',
            'state'        => "required",
            'tribe'        => "required",
            'caption'      => "required|max:20",
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/individual/" . $file_name));

             $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/individual/frontendthumbnail/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/individual/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            $gallery = DB::table('individual_gallery')
            ->where('id', decrypt($id))
            ->get();

            DB::table('individual_gallery')->where('id', decrypt($id))->update(
                [
                    'state'      => $request->input('state'),
                    'tribe'      => $request->input('tribe'),
                    'caption'    => $request->input('caption'),
                    'file'       => $file_name,
                    'date'       => $date_i,
                    "updated_at" => \Carbon\Carbon::now(),
                ]
            );

        if(file_exists(public_path("assets/gallery/individual/" . $gallery[0]->file))) {
            File::delete(public_path("assets/gallery/individual/" . $gallery[0]->file));
        }

        if(file_exists(public_path("assets/gallery/individual/thumbnail/" . $gallery[0]->file))) {
            File::delete(public_path("assets/gallery/individual/thumbnail/" . $gallery[0]->file));
        }

        if(file_exists(public_path("assets/gallery/individual/frontendthumbnail/" . $gallery[0]->file))) {
            File::delete(public_path("assets/gallery/individual/frontendthumbnail/" . $gallery[0]->file));
        }

            return redirect()->back()->with('msg', '<p class="text-success">Data updated successfully</p>');

        } else {

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

             DB::table('individual_gallery')->where('id', decrypt($id))->update(
                [
                    'state'      => $request->input('state'),
                    'tribe'      => $request->input('tribe'),
                    'caption'    => $request->input('caption'),
                    'date'       => $date_i,
                    "updated_at" => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Data updated successfully</p>');
        }
    }

    public function getTribe(Request $request)
    {
        $state = $request->input('state');
        $option   = '<option value="" selected="" disabled="">--SELECT TRIBE--</option>';
        
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
        $i = 0;
        foreach ($tribes as $tribe) {
            $option  .= '<option value="'.$tribes[$i].'">'.$tribes[$i].'</option>';
            $i++;
        }
         echo ($option);
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
            6 => 'caption',
        );

        $totalData = DB::table('individual_gallery')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $gallery_tribe_data = DB::table('individual_gallery')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $gallery_tribe_data = DB::table('individual_gallery')
                ->orWhere('individual_gallery.state', 'LIKE', "%{$search}%")
                ->orWhere('individual_gallery.tribe', 'LIKE', "%{$search}%")
                ->orWhere('individual_gallery.caption', 'LIKE', "%{$search}%")
                ->orWhere('individual_gallery.date', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('individual_gallery')
                ->orWhere('individual_gallery.state', 'LIKE', "%{$search}%")
                ->orWhere('individual_gallery.tribe', 'LIKE', "%{$search}%")
                ->orWhere('individual_gallery.caption', 'LIKE', "%{$search}%")
                ->orWhere('individual_gallery.date', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($gallery_tribe_data)) {

            $cnt = 1;

            foreach ($gallery_tribe_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning\" href=\"" . route('gallery.individual.update_view', ['id' => encrypt($single_data->id)]) . "\" style=\"margin-right: 10px;\">Update</a><a class=\"btn btn-danger\" href=\"" . route('gallery.individual.delete', ['id' => $single_data->id]) . "\">Delete</a>";

                $file                  = "";
                $file                  = "<a class=\"publication_file\" href='../../../assets/gallery/individual/".$single_data->file."' target='_blank'><img src=\"../../../assets/gallery/individual/thumbnail/".$single_data->file."\"><i class=\"fa fa-share-square\"></i></a>";

                $nestedData['id']       = $cnt;
                $nestedData['file']     = $file;
                $nestedData['state']    = $single_data->state;
                $nestedData['tribe']    = $single_data->tribe;
                $nestedData['caption']  = $single_data->caption;
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

        $individual_gallery = DB::table('individual_gallery')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/gallery/individual/" . $individual_gallery[0]->file))) {
            File::delete(public_path("assets/gallery/individual/" . $individual_gallery[0]->file));
        }

        if(file_exists(public_path("assets/gallery/individual/thumbnail/" . $individual_gallery[0]->file))) {
            File::delete(public_path("assets/gallery/individual/thumbnail/" . $individual_gallery[0]->file));
        }

        if(file_exists(public_path("assets/gallery/individual/frontendthumbnail/" . $individual_gallery[0]->file))) {
            File::delete(public_path("assets/gallery/individual/frontendthumbnail/" . $individual_gallery[0]->file));
        }

        DB::table('individual_gallery')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}