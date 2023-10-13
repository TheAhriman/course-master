<?php

namespace App\Providers;

use App\Http\Services\BaseService;
use App\Http\Services\Interfaces\BaseServiceInterface;
use App\Http\Services\Interfaces\PostServiceInterface;
use App\Http\Services\PostService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseServiceInterface::class, BaseService::class);
        $this->app->bind(PostServiceInterface::class, PostService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
