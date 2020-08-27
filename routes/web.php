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

require __DIR__ . '/frontend.php';

// Route::post('/image-upload', 'ImageController@store')->name('image-upload');

Route::group(['prefix' => 'admin'], function() {
Auth::routes([
  'register' => false,
]);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/home', 'HomeController@index')->name('home');

    Route::namespace('Auth')->group(function () {
        
        // ajax route
        Route::post('/password/reset', 'Password\PasswordResetController@update')->name('password.reset');

            Route::namespace('Heritage')->group(function () {
                Route::get('/home/heritage/upload-view', 'PostController@index')->name('heritage.upload-view');
                Route::get('/home/heritage/update-view/{id}', 'PostController@updateShow')->name('heritage.update_view');
                Route::put('/home/heritage/store', 'PostController@store')->name('heritage.store');
                Route::get('/home/heritage/view', 'PostController@show')->name('heritage.show');
                Route::get('home/heritage/delete/{id}', 'PostController@delete')->name('heritage.delete');
                Route::put('/home/heritage/update/{id}', 'PostController@update')->name('heritage.update');
                // ajax route
                Route::post('/home/heritage/get-data', 'PostController@get')->name('heritage.get_data');
            });

            Route::namespace('FolkTales')->group(function () {
                Route::get('/home/folk-tales/upload-view', 'PostController@index')->name('folk_tales.upload_view');
                Route::get('/home/folk-tales/update-view/{id}', 'PostController@updateShow')->name('folk_tales.update_view');
                Route::put('/home/folk-tales/store', 'PostController@store')->name('folk_tales.store');
                Route::get('/home/folk-tales/view', 'PostController@show')->name('folk_tales.show');
                Route::get('home/folk-tales/delete/{id}', 'PostController@delete')->name('folk_tales.delete');
                Route::put('/home/folk-tales/update/{id}', 'PostController@update')->name('folk_tales.update');
                // ajax route
                Route::post('/home/folk-tales/get-data', 'PostController@get')->name('folk_tales.get_data');
            });

            Route::namespace('YoutubeVideo')->group(function () {
                Route::get('/home/youtube-video/upload-view', 'PostController@index')->name('youtube_video.upload_view');
                Route::get('/home/youtube-video/update-view/{id}', 'PostController@updateShow')->name('youtube_video.update_view');
                Route::put('/home/youtube-video/store', 'PostController@store')->name('youtube_video.store');
                Route::get('/home/youtube-video/view', 'PostController@show')->name('youtube_video.show');
                Route::get('home/youtube-video/delete/{id}', 'PostController@delete')->name('youtube_video.delete');
                Route::put('/home/youtube-video/update/{id}', 'PostController@update')->name('youtube_video.update');
                // ajax route
                Route::post('/home/youtube-video/get-data', 'PostController@get')->name('youtube_video.get_data');
            });


            Route::namespace('Publication')->group(function () {
                Route::get('/home/publication/upload-view', 'PostController@index')->name('publication.upload-view');
                Route::get('/home/publication/update-view/{id}', 'PostController@updateShow')->name('publication.update_view');
                Route::put('/home/publication/update/{id}', 'PostController@update')->name('publication.update');
                Route::put('/home/publication/store', 'PostController@store')->name('publication.store');
                Route::get('/home/publication/view', 'PostController@show')->name('publication.show');
                Route::get('home/publication/delete/{id}', 'PostController@delete')->name('publication.delete');
                // ajax route
                Route::post('/home/publication/get-data', 'PostController@get')->name('publication.get_data');
            });
            
            Route::namespace('Magazine')->group(function () {
                Route::get('/home/magazine/upload-view', 'PostController@index')->name('magazine.upload-view');
                Route::get('/home/magazine/update-view/{id}', 'PostController@updateShow')->name('magazine.update_view');
                Route::put('/home/magazine/update/{id}', 'PostController@update')->name('magazine.update');
                Route::put('/home/magazine/store', 'PostController@store')->name('magazine.store');
                Route::get('/home/magazine/view', 'PostController@show')->name('magazine.show');
                Route::get('home/magazine/delete/{id}', 'PostController@delete')->name('magazine.delete');
                // ajax route
                Route::post('/home/magazine/get-data', 'PostController@get')->name('magazine.get_data');
            });

             Route::namespace('CurrentIssue')->group(function () {
                Route::get('/home/current-issue/upload-view', 'PostController@index')->name('current_issue.upload-view');
                Route::get('/home/current-issue/update-view/{id}', 'PostController@updateShow')->name('current_issue.update_view');
                Route::put('/home/current-issue/store', 'PostController@store')->name('current_issue.store');
                Route::put('/home/current-issue/update/{id}', 'PostController@update')->name('current_issue.update');
                Route::get('/home/current-issue/view', 'PostController@show')->name('current_issue.show');
                Route::get('home/current-issue/delete/{id}', 'PostController@delete')->name('current_issue.delete');
                Route::get('home/current-issue/single-view/{id}', 'PostController@singleView')->name('current_issue.single_view');
                // ajax route
                Route::post('/home/current-issue/get-data', 'PostController@get')->name('current_issue.get_data');
            });

            Route::namespace('Gallery')->group(function () {
                Route::namespace('Individual')->group(function() {
                    Route::get('/home/gallery/individual/upload-view', 'PostController@index')->name('gallery.individual.upload-view');
                    Route::put('/home/gallery/individual/store', 'PostController@store')->name('gallery.individual.store');
                    Route::get('/home/gallery/individual/update-view/{id}', 'PostController@updateShow')->name('gallery.individual.update_view');
                    Route::put('/home/gallery/individual/update/{id}', 'PostController@update')->name('gallery.individual.update');
                    Route::get('/home/gallery/individual/view', 'PostController@show')->name('gallery.individual.show');
                    Route::get('/home/gallery/individual/delete/{id}', 'PostController@delete')->name('gallery.individual.delete');
                    // ajax route
                    Route::post('/home/gallery/individual/get-data', 'PostController@get')->name('gallery.individual.get_data');
                    Route::post('/home/gallery/individual/get-tribe-data', 'PostController@getTribe')->name('gallery.individual.get_tribe_based_on_state');
                });
                Route::namespace('State')->group(function() {
                    Route::get('/home/gallery/state/upload-view', 'PostController@index')->name('gallery.state.upload-view');
                    Route::put('/home/gallery/state/store', 'PostController@store')->name('gallery.state.store');
                    Route::get('/home/gallery/state/view', 'PostController@show')->name('gallery.state.show');
                    // ajax route
                    Route::post('/home/gallery/state/get-data', 'PostController@get')->name('gallery.state.get_data');
                });
                Route::namespace('Tribe')->group(function() {
                    Route::get('/home/gallery/state/tribe/upload-view/', 'PostController@index')->name('gallery.state.tribe.upload-view');
                    Route::get('/home/gallery/state/tribe/update-view/{id}', 'PostController@updateShow')->name('gallery.state.tribe.update_view');
                    Route::put('/home/gallery/state/tribe/update/{id}', 'PostController@update')->name('gallery.state.tribe.update');
                    Route::put('/home/gallery/tribe/state/store', 'PostController@store')->name('gallery.state.tribe.store');
                    Route::get('/home/gallery/state/tribe/view', 'PostController@show')->name('gallery.state.tribe.show');
                    Route::get('/home/gallery/state/tribe/delete/{id}', 'PostController@delete')->name('gallery.state.tribe.delete');
                    // ajax route
                    Route::post('/home/gallery/state/tribe/get-data', 'PostController@get')->name('gallery.state.tribe.get_data');
                });
            });
             Route::namespace('Events')->group(function () {
                Route::namespace('Individual')->group(function() {
                    Route::get('/home/events/individual/upload-view', 'PostController@index')->name('events.individual.upload_view');
                    Route::put('/home/events/individual/store', 'PostController@store')->name('events.individual.store');
                    Route::get('/home/events/individual/update-view/{id}', 'PostController@updateShow')->name('events.individual.update_view');
                    Route::put('/home/events/individual/update/{id}', 'PostController@update')->name('events.individual.update');
                    Route::get('/home/events/individual/view', 'PostController@show')->name('events.individual.show');
                    Route::get('/home/events/individual/delete/{id}', 'PostController@delete')->name('events.individual.delete');
                    // ajax route
                    Route::post('/home/events/individual/get-data', 'PostController@get')->name('events.individual.get_data');
                });
                Route::namespace('EventsCover')->group(function() {
                    Route::get('/home/events/events-cover/upload-view', 'PostController@index')->name('events.cover.upload_view');
                    Route::put('/home/events/events-cover/store', 'PostController@store')->name('events.cover.store');
                    Route::get('/home/events/events-cover/update-view/{id}', 'PostController@updateShow')->name('events.cover.update_view');
                    Route::put('/home/events/events-cover/update/{id}', 'PostController@update')->name('events.cover.update');
                    Route::get('/home/events/events-cover/view', 'PostController@show')->name('events.cover.show');
                    Route::get('/home/events/events-cover/delete/{id}', 'PostController@delete')->name('events.cover.delete');
                    // ajax route
                    Route::post('/home/events/events-cover/get-data', 'PostController@get')->name('events.cover.get_data');
                });
            });

            // Plan
            Route::namespace('Plan')->group(function () {
                Route::get('/home/plan/view/form', 'PostController@index')->name('plan.view');
                Route::get('/home/plan/update-view/{id}', 'PostController@updateShow')->name('plan.update_view');
                Route::post('/home/plan/update/', 'PostController@update')->name('plan.update');
                Route::post('/home/plan/store', 'PostController@store')->name('plan.store');
                Route::get('/home/plan/view', 'PostController@show')->name('plan.show');
                Route::get('home/plan/delete/{id}', 'PostController@delete')->name('plan.delete');
                // ajax route
                Route::get('/home/plan/list', 'PostController@get')->name('admin.ajax.plan_list');
            });
            
            // Member Subscription
            Route::namespace('MemberSubscription')->group(function () {
                Route::get('/home/member_subscription/view/form', 'PostController@index')->name('member_subscription.view');
                Route::get('/home/member_subscription/update-view/{id}', 'PostController@updateShow')->name('member_subscription.update_view');
                Route::post('/home/member_subscription/update/', 'PostController@update')->name('member_subscription.update');
                Route::put('/home/member_subscription/store', 'PostController@store')->name('member_subscription.store');
                Route::get('/home/member_subscription/view', 'PostController@show')->name('member_subscription.show');
                Route::get('home/member_subscription/delete/{id}', 'PostController@delete')->name('member_subscription.delete');
                // ajax route
                Route::get('/home/member_subscription/list', 'PostController@get')->name('admin.ajax.member_subscription_list');
            });

            // Member
            Route::namespace('Member')->group(function () {
                Route::get('/home/member/view/form', 'PostController@index')->name('member.view');
                Route::get('/home/member/update-view/{id}', 'PostController@updateShow')->name('member.update_view');
                Route::post('/home/member/update/', 'PostController@update')->name('member.update');
                Route::put('/home/member/store', 'PostController@store')->name('member.store');
                Route::get('/home/member/view', 'PostController@show')->name('member.show');
                Route::get('home/member/delete/{id}', 'PostController@delete')->name('member.delete');
                // ajax route
                Route::get('/home/member/list', 'PostController@get')->name('admin.ajax.member_data_list');
            });
        });
});
