<?php

namespace App\Providers;

use App\Http\Resources\CreateDevResource;
use App\Http\Resources\Dev;
use App\Http\Resources\DevResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

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
        //CreateDevResource::withoutWrapping();
        JsonResource::withoutWrapping();
    }
}
