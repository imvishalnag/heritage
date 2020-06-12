<?php

namespace App\Http\Controllers\Auth\Password;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Response;
use DB;


class PasswordResetController extends Controller
{

    public function update(Request $request)
    {
        $password   = $request->input('password');
        $c_password = $request->input('confirm_password');
        if (empty($password) || empty($c_password)) {
            echo "<span class='text-danger'>Passwords required!</span>";
            die();
        } elseif($password != $c_password) {
            echo "<span class='text-danger'>Passwords do not match!</span>";
            die();
        } elseif(strlen($password) < 8) {
            echo "<span class='text-danger'>Password must be 8 character long!</span>";
            die();
        }

        DB::table('users')->where('id', Auth::user()->id)->update(
            [
                'password'   => Hash::make($request->input('password')),
                'updated_at' => now(),
            ]
        );
        echo "<span class='text-success'>Password updated successfully</span>";
    }
}