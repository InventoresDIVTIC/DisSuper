<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Agrega esta línea
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /** Register any application services. */
    public function register(): void
    {
        // ...
    }

    /** Bootstrap any application services. */
    public function boot(): void
    {
        /*
        if(env(key:'APP_ENV') !== 'local'){
            URL::forceSchema('https');
        }
        */

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $userId = Auth::id();
                $notifications = Notification::where('user_id', $userId)->get();
                ///dd($notifications);
                $view->with('notifications', $notifications);
            }
        });
    }
}
