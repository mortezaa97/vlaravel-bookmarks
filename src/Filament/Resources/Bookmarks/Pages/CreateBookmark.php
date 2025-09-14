<?php

declare(strict_types=1);

namespace Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\Pages;

use Filament\Resources\Pages\CreateRecord;
use Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\BookmarkResource;

class CreateBookmark extends CreateRecord
{
    protected static string $resource = BookmarkResource::class;
}
