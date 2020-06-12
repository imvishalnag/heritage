<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend/includes/*', function ($view) {
            $current_issue_for_footer = DB::table('current_issue')->orderBy('id', 'desc')->take(2)->get();
            // dd($current_issue_for_footer);
            $view->with('current_issue_for_footer', $current_issue_for_footer);
        });
    }
}
