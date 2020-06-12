<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "<center><h1 style='text-transform: uppercase; text-align: center; padding: 15px 20px; margin-top: 5%; font-family: sans-serif; font-size: 50px; color: #fff; background-color: green; display: inline-block; border-radius: 10px;'>cache cleared!</h1></center>";
});

Route::get('/', 'Frontend\Home\PostController@index');

Route::get('home','Frontend\Home\PostController@index')->name('frontend.home'); 

Route::get('about', function () {
    return view('frontend.pages.about');
})->name('about');

Route::get('donation', function () {
    return view('frontend.pages.donation');
})->name('donation');

Route::get('/heritage', 'Frontend\Heritage\PostController@index')->name('heritage');
Route::get('/heritage/single/{id}', 'Frontend\Heritage\PostController@indexSingle')->name('heritage.single');
Route::get('/heritage/single/pdf/{file}', 'Frontend\Heritage\PostController@indexSinglePdf')->name('heritage.single_pdf');

Route::get('/folk-tales', 'Frontend\Folktales\PostController@index')->name('folk_tales');
Route::get('/folk-tales/single/{id}', 'Frontend\Folktales\PostController@indexSingle')->name('folk_tales.single');
Route::get('/folk-tales/single/pdf/{file}', 'Frontend\Folktales\PostController@indexSinglePdf')->name('folk_tales.single_pdf');

Route::get('/magazine', 'Frontend\Magazine\PostController@index')->name('magazine');

Route::get('/publication', 'Frontend\Publication\PostController@index')->name('publication');

Route::get('/current-issue', 'Frontend\CurrentIssue\PostController@index'
)->name('current_issue');
Route::get('/current-issue/single/{id}', 'Frontend\CurrentIssue\PostController@indexSingle'
)->name('current_issue.single');

Route::get('/events', 'Frontend\Events\PostController@index')->name('events');
Route::get('/events/single/{id}', 'Frontend\Events\PostController@indexSingle')->name('events.single');

Route::get('/video', 'Frontend\Video\PostController@index')->name('video');

Route::get('/tribes-of-north-east', function () {
    return view('frontend.pages.tribes');
})->name('tribes_of_ne');

Route::get('/tribe/arunachal', function () {
    return view('frontend.pages.tribes_arunachalpradesh');
})->name('arunachalpradesh_tribe');

Route::get('/tribe/assam', function () {
    return view('frontend.pages.tribes_assam');
})->name('assam_tribe');

Route::get('/tribe/manipur', function () {
    return view('frontend.pages.tribes_manipur');
})->name('manipur_tribe');

Route::get('/tribe/meghalaya', function () {
    return view('frontend.pages.tribes_meghalaya');
})->name('meghalaya_tribe');

Route::get('/tribe/mizoram', function () {
    return view('frontend.pages.tribes_mizoram');
})->name('mizoram_tribe');

Route::get('/tribe/nagaland', function () {
    return view('frontend.pages.tribes_nagaland');
})->name('nagaland_tribe');

Route::get('/tribe/sikkim', function () {
    return view('frontend.pages.tribes_sikkim');
})->name('sikkim_tribe');

Route::get('/tribe/tripura', function () {
    return view('frontend.pages.tribes_tripura');
})->name('tripura_tribe');

Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact');

Route::get('/membership', function () {
    return view('frontend.pages.membership');
})->name('membership');

Route::get('/checkout', function () {
    return view('frontend.pages.checkout');
})->name('checkout');

Route::get('/thank', function () {
    return view('frontend.pages.thank');
})->name('thank');

Route::get('/member/login', function () {
    return view('frontend.pages.login');
})->name('member.login');

Route::get('/member/register', function () {
    return view('frontend.pages.signup');
})->name('member.register');

Route::namespace('Frontend')->group(function () {
    Route::namespace('Gallery')->group(function () {
        Route::get('/gallery/state', 'PostController@indexState')->name('gallery');
        Route::get('/gallery/state/tribe/{state}', 'PostController@indexTribe')->name('gallery.state.tribe');
        Route::get('/gallery/state/tribe/individual/{state}/{tribe}', 'PostController@index')->name('gallery.state.tribe.individual');

    });
});