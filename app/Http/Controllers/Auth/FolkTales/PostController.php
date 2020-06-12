<?php

namespace App\Http\Controllers\Auth\FolkTales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Response;
use Carbon;
use DB;


class PostController extends Controller
{
    public function index()
    {
        return view('admin.auth.folktales.index');
    }

    public function show()
    {
        return view('admin.auth.folktales.show');
    }
    
     public function updateShow($id)
    {
        $folk_tale      = DB::table('folk_tales')
                        ->where('id', decrypt($id))
                        ->get();
        $state          = $folk_tale[0]->state;
        $heading        = $folk_tale[0]->heading;
        $file           = $folk_tale[0]->file;
        return view('admin.auth.folktales.update', ['state' => $state, 'heading' => $heading, 'file' => $file, 'id' => $id]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'file'         => "required|mimetypes:application/pdf|max:5000",
            'heading'      => "required|min:5|max:100",
            'state'        => "required",
        ]);

        if ($request->hasFile('file')) {

            $file_upload = $request->file('file');
            $file   = time().'.'.$file_upload->getClientOriginalExtension();

            $path = $request->file('file')->move('assets/folktales/',$file);

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('folk_tales')->insert(
                [
                    'heading' => $request->input('heading'),
                    'file' => $file,
                    'date' => $date_i,
                    'state'=> $request->input('state'),
                    "created_at"  =>  \Carbon\Carbon::now(),
                    "updated_at"  => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">File uploaded successfully</p>');

        } else
            return redirect()->back()->with('msg', '<p class="text-danger">Please upload file!</p>');
    }
    
     public function update(Request $request, $id)
    {
        $id = decrypt($id);
        
        $request->validate([
            'file'         => "mimetypes:application/pdf|max:5000",
            'heading'      => "required|min:5|max:100",
            'state'        => "required",
        ]);

        if ($request->hasFile('file')) {

            $file_upload = $request->file('file');
            $file   = time().'.'.$file_upload->getClientOriginalExtension();

            $path = $request->file('file')->move('assets/folktales/',$file);

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('folk_tales')->where('id', $id)->update(
                [
                    'heading' => $request->input('heading'),
                    'file'    => $file,
                    'date'    => $date_i,
                    'state'   => $request->input('state'),
                    "updated_at"  => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">File updated successfully</p>');

        } else {
            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('folk_tales')->where('id', $id)->update(
                [
                    'heading' => $request->input('heading'),
                    'date'    => $date_i,
                    'state'   => $request->input('state'),
                    "updated_at"  => \Carbon\Carbon::now(),
                ]
            );
            return redirect()->back()->with('msg', '<p class="text-success">File updated successfully</p>');
        }
    }

    public function get(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'file',
            2 => 'heading',
            3 => 'date',
            4 => 'action',
            5 => 'state',
        );

        $totalData = DB::table('folk_tales')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $folk_tales_data = DB::table('folk_tales')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $folk_tales_data = DB::table('folk_tales')
                ->orWhere('folk_tales.file', 'LIKE', "%{$search}%")
                >orWhere('folk_tales.state', 'LIKE', "%{$search}%")
                ->orWhere('folk_tales.heading', 'LIKE', "%{$search}%")
                ->orWhere('folk_tales.date', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('folk_tales')
                ->orWhere('folk_tales.file', 'LIKE', "%{$search}%")
                >orWhere('folk_tales.state', 'LIKE', "%{$search}%")
                ->orWhere('folk_tales.heading', 'LIKE', "%{$search}%")
                ->orWhere('folk_tales.date', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($folk_tales_data)) {

            $cnt = 1;

            foreach ($folk_tales_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning\" href=\"" . route('folk_tales.update_view', ['id' => encrypt($single_data->id)]) . "\" style=\"margin-right: 10px;\">Update</a><a class=\"btn btn-danger\" href=\"" . route('folk_tales.delete', ['id' => encrypt($single_data->id)]) . "\">Delete</a>";

                $file                  = "";
                $file                  = "<a href='../../assets/folktales/".$single_data->file."' target='_blank'><i class=\"fa fa-file-pdf\" style=\"padding-right: 5px;\"></i><i class=\"fa fa-share-square\"></i></a>";

                $nestedData['id']       = $cnt;
                $nestedData['file']     = $file;
                $nestedData['heading']  = $single_data->heading;
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
        $id = decrypt($id);
        $folk_tales = DB::table('folk_tales')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/folktales/" . $folk_tales[0]->file))) {
            File::delete(public_path("assets/folktales/" . $folk_tales[0]->file));
        }

        DB::table('folk_tales')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}