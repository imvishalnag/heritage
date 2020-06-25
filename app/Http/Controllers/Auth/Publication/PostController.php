<?php

namespace App\Http\Controllers\Auth\Publication;

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
        return view('admin.auth.publication.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'file'         => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title'        => "required",
            'price'        => "required|integer|min:1",
            'author'       => "required|min:3",
        ]);

        if ($request->hasFile('file') && $request->hasFile('pdf_file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $file_upload = $request->file('pdf_file');
            $file   = time().'.'.$file_upload->getClientOriginalExtension();
            $path = $request->file('pdf_file')->move('assets/magazine/',$file);

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/publication/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/publication/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('publication')->insert(
                [
                    'title'      => $request->input('title'),
                    'price'      => $request->input('price'),
                    'author'     => $request->input('author'),
                    'file'       => $file_name,
                    'pdf_file'   => $path,
                    'date'       => $date_i,
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
        return view('admin.auth.publication.show');
    }

        public function updateShow($id)
    {
        $publication = DB::table('publication')
                        ->where('id', decrypt($id))
                        ->get();
        $title        = $publication[0]->title;
        $file         = $publication[0]->file;
        $price        = $publication[0]->price;
        $author       = $publication[0]->author;

        return view('admin.auth.publication.update', ['title' => $title, 'id' => $id, 'file' => $file, 'price' => $price, 'author' => $author]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'file'         => 'image|mimes:jpeg,png,jpg,gif,svg',
            'title'        => "required",
            'price'        => "required|integer|min:1",
            'author'       => "required|min:3",
        ]);

        if ($request->hasFile('file') && $request->hasFile('pdf_file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";
            $file_upload = $request->file('pdf_file');
            $file   = time().'.'.$file_upload->getClientOriginalExtension();
            $path = $request->file('pdf_file')->move('assets/magazine/',$file);

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/publication/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/publication/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            $publication = DB::table('publication')
            ->where('id', decrypt($id))
            ->get();

            DB::table('publication')->where('id', decrypt($id))->update(
                [
                    'title'      => $request->input('title'),
                    'price'      => $request->input('price'),
                    'author'     => $request->input('author'),
                    'file'       => $file_name,
                    'pdf_file'   => $path,
                    'date'       => $date_i,
                    "updated_at" => \Carbon\Carbon::now(),
                ]
            );

        if(file_exists(public_path("assets/publication/" . $publication[0]->file))) {
            File::delete(public_path("assets/publication/" . $publication[0]->file));
        }

        if(file_exists(public_path("assets/publication/thumbnail/" . $publication[0]->file))) {
            File::delete(public_path("assets/publication/thumbnail/" . $publication[0]->file));
        }

            return redirect()->back()->with('msg', '<p class="text-success">Data updated successfully</p>');

        } else {

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('publication')->where('id', decrypt($id))->update(
                [
                    'title'      => $request->input('title'),
                    'price'      => $request->input('price'),
                    'author'     => $request->input('author'),
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
            2 => 'title',
            3 => 'author',
            4 => 'price',
            5 => 'date',
            6 => 'action',
        );

        $totalData = DB::table('publication')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $publication_data = DB::table('publication')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $publication_data = DB::table('publication')
                ->orWhere('publication.file', 'LIKE', "%{$search}%")
                ->orWhere('publication.title', 'LIKE', "%{$search}%")
                ->orWhere('publication.author', 'LIKE', "%{$search}%")
                ->orWhere('publication.price', 'LIKE', "%{$search}%")
                ->orWhere('publication.date', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('publication')
                ->orWhere('publication.file', 'LIKE', "%{$search}%")
                ->orWhere('publication.title', 'LIKE', "%{$search}%")
                ->orWhere('publication.author', 'LIKE', "%{$search}%")
                ->orWhere('publication.price', 'LIKE', "%{$search}%")
                ->orWhere('publication.date', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($publication_data)) {

            $cnt = 1;

            foreach ($publication_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning\" href=\"" . route('publication.update_view', ['id' => encrypt($single_data->id)]) . "\" style=\"margin-right: 10px;\">Update</a><a class=\"btn btn-danger\" href=\"" . route('publication.delete', ['id' => $single_data->id]) . "\">Delete</a>";

                $file                  = "";
                $file                  = "<a class=\"publication_file\" href='../../assets/publication/".$single_data->file."' target='_blank'><img src=\"../../assets/publication/thumbnail/".$single_data->file."\"><i class=\"fa fa-share-square\"></i></a>";

                $nestedData['id']       = $cnt;
                $nestedData['file']     = $file;
                $nestedData['title']    = $single_data->title;
                $nestedData['author']   = $single_data->author;
                $nestedData['price']    = "Rs. ".$single_data->price."/-";
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

        $publication = DB::table('publication')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/publication/" . $publication[0]->file))) {
            File::delete(public_path("assets/publication/" . $publication[0]->file));
        }

        if(file_exists(public_path("assets/publication/thumbnail/" . $publication[0]->file))) {
            File::delete(public_path("assets/publication/thumbnail/" . $publication[0]->file));
        }

        DB::table('publication')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}