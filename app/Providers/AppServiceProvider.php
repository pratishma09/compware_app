<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Course;
use App\Models\Team;
use Illuminate\Support\Facades\Request;


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
        //
        View::composer('*', function ($view) {
            if (!Request::is('courses/*') && !Request::is('courses')) {
                if (!$view->offsetExists('courses')) {
                    $courses = Course::all(); 
                    $view->with('courses', $courses);
                }
                $teams = Team::all();
                $view->with('teams', $teams);
            }
            
        });
    }
}
