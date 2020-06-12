<?php

namespace App\Http\Controllers\Auth\Heritage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Response;
use DB;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.auth.heritage.index');
    }

    public function show()
    {
        return view('admin.auth.heritage.show');
    }

    public function updateShow($id)
    {
        $heritage = DB::table('heritage')
                        ->where('id', decrypt($id))
                        ->get();
        $year           = $heritage[0]->year;
        $file           = $heritage[0]->file;
        $month          = $heritage[0]->month;
        return view('admin.auth.heritage.update', ['file' => $file, 'year' => $year, 'month' => $month, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $request->validate([
            'file'         => "mimetypes:application/pdf|max:20000",
            'year'         => "required|digits:4|integer|min:1900|max:2099",
            'month'        => "required|max:20",
        ]);

        if ($request->hasFile('file')) {

            $file_upload = $request->file('file');
            $file        = time().'.'.$file_upload->getClientOriginalExtension();
            $path        = $request->file('file')->move('assets/heritage/',$file);

            $date_i   = now();
            $date_i   = date('m/d/Y', strtotime($date_i));

            $heritage = DB::table('heritage')
            ->where('id', $id)
            ->get();

            DB::table('heritage')->where('id', $id)->update(
                [
                    'year'       => $request->input('year'),
                    'month'      => $request->input('month'),
                    'file'       => $file,
                    'date'       => $date_i,
                    'updated_at' => now(),
                ]
            );

        if(file_exists(public_path("assets/heritage/" . $heritage[0]->file))) {
            File::delete(public_path("assets/heritage/" . $heritage[0]->file));
        }

            return redirect()->back()->with('msg', '<p class="text-success">Data updated successfully</p>');

        } else {
            // dd("else");

            $date_i   = now();
            $date_i   = date('m/d/Y', strtotime($date_i));

            DB::table('heritage')->where('id', $id)->update(
                [
                    'year'  => $request->input('year'),
                    'month' => $request->input('month'),
                    'date'  => $date_i,
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Data updated successfully</p>');
        }
    }

    public function store(Request $request)
    {

        $request->validate([
            'file'         => "required|mimetypes:application/pdf|max:20000",
            'year'         => "required|digits:4|integer|min:1900|max:2099",
            'month'        => "required|max:20",
        ]);

        if ($request->hasFile('file')) {

            $file_upload = $request->file('file');
            $file   = time().'.'.$file_upload->getClientOriginalExtension();

            $path = $request->file('file')->move('assets/heritage/',$file);

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('heritage')->insert(
                [
                    'year'      => $request->input('year'),
                    'month'     => $request->input('month'),
                    'file'      => $file,
                    'date'      => $date_i,
                    'created_at'=> now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">File uploaded successfully</p>');

        } else
            return redirect()->back()->with('msg', '<p class="text-danger">Please upload file!</p>');
    }

    public function get(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'file',
            2 => 'year',
            3 => 'month',
            4 => 'date',
            5 => 'action',
        );

        $totalData = DB::table('heritage')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $heritage_data = DB::table('heritage')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $heritage_data = DB::table('heritage')
                ->orWhere('heritage.file', 'LIKE', "%{$search}%")
                ->orWhere('heritage.year', 'LIKE', "%{$search}%")
                ->orWhere('heritage.month', 'LIKE', "%{$search}%")
                ->orWhere('heritage.date', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('heritage')
                ->orWhere('heritage.file', 'LIKE', "%{$search}%")
                ->orWhere('heritage.year', 'LIKE', "%{$search}%")
                ->orWhere('heritage.month', 'LIKE', "%{$search}%")
                ->orWhere('heritage.date', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($heritage_data)) {

            $cnt = 1;

            foreach ($heritage_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning\" href=\"" . route('heritage.update_view', ['id' => encrypt($single_data->id)]) . "\" style=\"margin-right: 10px;\">Update</a><a class=\"btn btn-danger\" href=\"" . route('heritage.delete', ['id' => $single_data->id]) . "\">Delete</a>";

                $file                  = "";
                $file                  = "<a href='../../assets/heritage/".$single_data->file."' target='_blank'><i class=\"fa fa-file-pdf\" style=\"padding-right: 5px;\"></i><i class=\"fa fa-share-square\"></i></a>";

                $nestedData['id']       = $cnt;
                $nestedData['file']     = $file;
                $nestedData['year']     = $single_data->year;
                $nestedData['month']    = $single_data->month;
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

        $heritage = DB::table('heritage')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/heritage/" . $heritage[0]->file))) {
            File::delete(public_path("assets/heritage/" . $heritage[0]->file));
        }

        DB::table('heritage')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}