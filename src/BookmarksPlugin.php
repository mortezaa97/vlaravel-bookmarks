<?php

declare(strict_types=1);

namespace Mortezaa97\Bookmarks;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\BookmarkResource;

class BookmarksPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'bookmarks';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                'BookmarkResource' => BookmarkResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
