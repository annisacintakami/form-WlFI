<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\ServiceProvider;
use App\Models\Instructor;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View::composer(['compro.*'], function ($view) {
        //     $view->with('instruktur', Instructor::orderBy('id', 'DESC')->limit(4)->get());
        // });


        if (class_exists(Contact::class)) {
            View::composer('admin.*', function ($view) {
                $newMessage = Contact::whereNull('reply')->count();
                $view->with('newMessage', $newMessage);
            });
        }
    }
}
