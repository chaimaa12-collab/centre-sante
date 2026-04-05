<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // Railway / reverse proxies: APP_URL must be a full URL. Fix common typo (missing https://).
        $url = (string) config('app.url', '');
        if ($url !== '' && ! preg_match('#^https?://#i', $url)) {
            config(['app.url' => 'https://'.ltrim($url, '/')]);
        }

        // So url(), route(), and session cookies use HTTPS behind TLS-terminating proxies.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
