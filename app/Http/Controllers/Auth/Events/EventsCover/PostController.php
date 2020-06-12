<?php

namespace App\Http\Controllers\Auth\Events\EventsCover;

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
        return view('admin.auth.events.events_cover.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'file'         => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'event'        => "required|max:150",
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/events/cover/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/events/cover/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('events_cover')->insert(
                [
                    'event'       => $request->input('event'),
                    'file'        => $file_name,
                    'date'        => $date_i,
                    "created_at"  =>  \Carbon\Carbon::now(),
                    "updated_at"  => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Event cover added successfully</p>');

        } else
            return redirect()->back()->with('msg', '<p class="text-danger">Please upload image!</p>');
    }

    public function show()
    {
        return view('admin.auth.events.events_cover.show');
    }

    public function Updateshow($id)
    {
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $events_cover = DB::table('events_cover')
                        ->where('id', $id)
                        ->get();
        $id             = $events_cover[0]->id;
        $file           = $events_cover[0]->file;
        $event          = $events_cover[0]->event;

        return view('admin.auth.events.events_cover.update', ['file' => $file, 'id' => $id, 'event' => $event]);
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);

        $request->validate([
            'file'    => 'image|mimes:jpeg,png,jpg,gif,svg',
            'event'   => "required|max:150",
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/events/cover/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/events/cover/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            $events_cover = DB::table('events_cover')
            ->where('id', $id)
            ->get();

            if(file_exists(public_path("assets/events/cover/" . $events_cover[0]->file))) {
                File::delete(public_path("assets/events/cover/" . $events_cover[0]->file));
            }

            if(file_exists(public_path("assets/events/cover/thumbnail/" . $events_cover[0]->file))) {
                File::delete(public_path("assets/events/cover/thumbnail/" . $events_cover[0]->file));
            }

            DB::table('events_cover')->where('id', $id)->update(
                [
                    'event'       => $request->input('event'),
                    'file'        => $file_name,
                    'date'        => $date_i,
                    "updated_at"  => \Carbon\Carbon::now(),
                ]
            );

            if(file_exists(public_path("assets/events/cover/" . $events_cover[0]->file))) {
                File::delete(public_path("assets/events/cover/" . $events_cover[0]->file));
            }

            if(file_exists(public_path("assets/events/cover/thumbnail/" . $events_cover[0]->file))) {
                File::delete(public_path("assets/events/cover/thumbnail/" . $events_cover[0]->file));
            }

            return redirect()->back()->with('msg', '<p class="text-success">Event cover updated successfully</p>');

        } else {

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('events_cover')->where('id', $id)->update(
                [
                    'event'       => $request->input('event'),
                    'date'        => $date_i,
                    "updated_at"  => \Carbon\Carbon::now(),
                ]
            );
            return redirect()->back()->with('msg', '<p class="text-success">Event cover updated successfully</p>');
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
        );

        $totalData = DB::table('events_cover')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $events_cover_data = DB::table('events_cover')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $events_cover_data = DB::table('events_cover')
                ->orWhere('events_cover.event', 'LIKE', "%{$search}%")
                ->orWhere('events_cover.date', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('events_cover')
                ->orWhere('events_cover.event', 'LIKE', "%{$search}%")
                ->orWhere('events_cover.date', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($events_cover_data)) {

            $cnt = 1;

            foreach ($events_cover_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning\" href=\"" . route('events.cover.update_view', ['id' => encrypt($single_data->id)]) . "\" style=\"margin-right: 10px;\">Update</a><a class=\"btn btn-danger\" href=\"" . route('events.cover.delete', ['id' => $single_data->id]) . "\">Delete</a>";

                $file                  = "";
                $file                  = "<a class=\"publication_file\" href='../../../assets/events/cover/".$single_data->file."' target='_blank'><img src=\"../../../assets/events/cover/thumbnail/".$single_data->file."\"><i class=\"fa fa-share-square\"></i></a>";

                $nestedData['id']       = $cnt;
                $nestedData['file']     = $file;
                $nestedData['event']    = $single_data->event;
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

        $events_cover = DB::table('events_cover')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/events/cover/" . $events_cover[0]->file))) {
            File::delete(public_path("assets/events/cover/" . $events_cover[0]->file));
        }

        if(file_exists(public_path("assets/events/cover/thumbnail/" . $events_cover[0]->file))) {
            File::delete(public_path("assets/events/cover/thumbnail/" . $events_cover[0]->file));
        }

        DB::table('events_cover')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}