<?php

namespace App\Providers;

use App\Models\User;
use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
        
            $this->app->bind(
                'App\Repositories\Interfaces\IPostRepository',
                'App\Repositories\Services\PostRepository'
            );
            $this->app->bind(
                'App\Repositories\Interfaces\IUserRepository',
                'App\Repositories\Services\UserRepository'
            );
            // User::created(function($user){
            // Mail::to($user)->send(new WelcomeUser($user));
            // });
    
    }
}
