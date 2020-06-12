<?php

namespace App\Http\Controllers\Auth\Gallery\Individual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Response;
use DB;
use Carbon;

class ImageController extends Controller
{
    public function store(Request $request)
    {

        dd('sdjkufh');

        $request->validate([
            'file'         => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(370, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/individual/" . $file_name));

            $image_resize->resize(270, 200, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/individual/frontendthumbnail/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/gallery/individual/thumbnail/" . $file_name));

            echo "ho gaya";

        } else
            echo "nahi hua";
    }
}