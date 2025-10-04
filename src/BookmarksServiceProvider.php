<?php

declare(strict_types=1);

namespace Mortezaa97\Bookmarks;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Mortezaa97\Bookmarks\Models\Bookmark;
use Mortezaa97\Bookmarks\Policies\BookmarkPolicy;

class BookmarksServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        Gate::policy(Bookmark::class, BookmarkPolicy::class);
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('sliders.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'bookmarks');

        // Register the main class to use with the facade
        $this->app->singleton('bookmarks', function () {
            return new Bookmarks;
        });
    }
}
