<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::currentPathResolver(function(){
            return url(request()->path());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $appUrl = config('app.url');

        if (app()->environment('local')) {
            // Ensure the development URL includes the port
            $parsedUrl = parse_url($appUrl);
            $scheme = $parsedUrl['scheme'] ?? 'http';
            $host = $parsedUrl['host'] ?? 'localhost';
            $port = $parsedUrl['port'] ?? '8000'; // Default port 8000 if not specified

            URL::forceRootUrl("{$scheme}://{$host}:{$port}");
        } else {
            // Keep default behavior for production
            URL::forceRootUrl($appUrl);
        }
    }
}
