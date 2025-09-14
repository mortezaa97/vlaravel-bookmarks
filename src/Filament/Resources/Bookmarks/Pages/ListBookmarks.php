<?php

declare(strict_types=1);

namespace Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\BookmarkResource;

class ListBookmarks extends ListRecords
{
    protected static string $resource = BookmarkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
