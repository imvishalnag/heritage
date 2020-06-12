<?php

namespace App\Http\Controllers\Auth\Events\Individual;

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
        $events = DB::table('events_cover')->orderBy('id', 'desc')->get();
        return view('admin.auth.events.individual.index', ['events' => $events]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'file'         => 'required',
            'event'        => "required",
            'caption'      => "max:50",
        ]);

        if ($request->hasFile('file')) {

            $allowedfileExtension=['jpg', 'jpeg','png', 'gif', 'bmp', 'JPG', 'JPEG','PNG', 'GIF', 'BMP'];

            $files = $request->file('file');

            //dd($files);

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

                $image_resize->save(public_path("assets/events/individual/" . $file_name));

                $image_resize->resize(370, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save(public_path("assets/events/individual/frontendthumbnail/" . $file_name));

                $image_resize->resize(68, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save(public_path("assets/events/individual/thumbnail/" . $file_name));

                $date_i  = now();
                $date_i  = date('m/d/Y', strtotime($date_i));

                DB::table('individual_events_gallery')->insert(
                    [
                        'event_id'   => decrypt($request->input('event')),
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
        return view('admin.auth.events.individual.show');
    }

    public function Updateshow($id)
    {
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $events_gallery = DB::table('individual_events_gallery')
                        ->join('events_cover', 'individual_events_gallery.event_id', '=', 'events_cover.id')
                        ->select('individual_events_gallery.*', 'events_cover.event')
                        ->where('individual_events_gallery.id', $id)
                        ->get();
        $event_id       = $events_gallery[0]->event_id;
        $file           = $events_gallery[0]->file;
        $caption        = $events_gallery[0]->caption;

        $events         = DB::table('events_cover')->orderBy('id', 'desc')->get();

        return view('admin.auth.events.individual.update', ['file' => $file, 'id' => $id, 'caption' => $caption, 'event_id' => $event_id, 'events' => $events]);
    }

    public function update(Request $request, $id)
    {
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $request->validate([
            'file'         => 'image|mimes:jpeg,png,jpg,gif,svg',
            'event'        => "required",
            'caption'      => "required|max:20",
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/events/individual/" . $file_name));

             $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/events/individual/frontendthumbnail/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/events/individual/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            $event_gallery = DB::table('individual_events_gallery')
            ->where('id', $id)
            ->get();

            DB::table('individual_events_gallery')->where('id', $id)->update(
                [
                    'event_id'   => decrypt($request->input('event')),
                    'caption'    => $request->input('caption'),
                    'file'       => $file_name,
                    'date'       => $date_i,
                    "updated_at" => \Carbon\Carbon::now(),
                ]
            );

        if(file_exists(public_path("assets/events/individual/" . $event_gallery[0]->file))) {
            File::delete(public_path("assets/events/individual/" . $event_gallery[0]->file));
        }

        if(file_exists(public_path("assets/events/individual/thumbnail/" . $event_gallery[0]->file))) {
            File::delete(public_path("assets/events/individual/thumbnail/" . $event_gallery[0]->file));
        }

        if(file_exists(public_path("assets/events/individual/frontendthumbnail/" . $event_gallery[0]->file))) {
            File::delete(public_path("assets/events/individual/frontendthumbnail/" . $event_gallery[0]->file));
        }

            return redirect()->back()->with('msg', '<p class="text-success">Data updated successfully</p>');

        } else {

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

             DB::table('individual_gallery')->where('id', $id)->update(
                [
                    'event_id'   => decrypt($request->input('event')),
                    'caption'    => $request->input('caption'),
                    'date'       => $date_i,
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
            2 => 'event',
            3 => 'date',
            4 => 'action',
            5 => 'caption',
        );

        $totalData = DB::table('individual_events_gallery')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $event_individual_data = DB::table('individual_events_gallery')
                ->join('events_cover', 'individual_events_gallery.event_id', '=', 'events_cover.id')
                ->select('individual_events_gallery.*', 'events_cover.event')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $event_individual_data = DB::table('individual_events_gallery')
                ->join('events_cover', 'individual_events_gallery.event_id', '=', 'events_cover.id')
                ->select('individual_events_gallery.*', 'events_cover.event')
                ->orWhere('individual_events_gallery.caption', 'LIKE', "%{$search}%")
                ->orWhere('events_cover.event', 'LIKE', "%{$search}%")
                ->orWhere('individual_events_gallery.caption', 'LIKE', "%{$search}%")
                ->orWhere('individual_events_gallery.date', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('individual_events_gallery')
                ->join('events_cover', 'individual_events_gallery.event_id', '=', 'events_cover.id')
                ->select('individual_events_gallery.*', 'events_cover.event')
                ->orWhere('individual_events_gallery.caption', 'LIKE', "%{$search}%")
                ->orWhere('events_cover.event', 'LIKE', "%{$search}%")
                ->orWhere('individual_events_gallery.caption', 'LIKE', "%{$search}%")
                ->orWhere('individual_events_gallery.date', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($event_individual_data)) {

            $cnt = 1;

            foreach ($event_individual_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning\" href=\"" . route('events.individual.update_view', ['id' => encrypt($single_data->id)]) . "\" style=\"margin-right: 10px;\">Update</a><a class=\"btn btn-danger\" href=\"" . route('events.individual.delete', ['id' => $single_data->id]) . "\">Delete</a>";

                $file                  = "";
                $file                  = "<a class=\"publication_file\" href='../../../assets/events/individual/".$single_data->file."' target='_blank'><img src=\"../../../assets/events/individual/thumbnail/".$single_data->file."\"><i class=\"fa fa-share-square\"></i></a>";

                $nestedData['id']       = $cnt;
                $nestedData['file']     = $file;
                $nestedData['event']    = $single_data->event;
                if ($single_data->caption == null) {
                    $caption = "N/A";
                } else {
                    $caption = $single_data->caption;
                }
                $nestedData['caption']  = $caption;
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

        $individual_event_gallery = DB::table('individual_events_gallery')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/events/individual/" . $individual_event_gallery[0]->file))) {
            File::delete(public_path("assets/events/individual/" . $individual_event_gallery[0]->file));
        }

        if(file_exists(public_path("assets/events/individual/thumbnail/" . $individual_event_gallery[0]->file))) {
            File::delete(public_path("assets/events/individual/thumbnail/" . $individual_event_gallery[0]->file));
        }

        if(file_exists(public_path("assets/events/individual/frontendthumbnail/" . $individual_event_gallery[0]->file))) {
            File::delete(public_path("assets/events/individual/frontendthumbnail/" . $individual_event_gallery[0]->file));
        }

        DB::table('individual_events_gallery')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}