<?php

declare(strict_types=1);

namespace Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\BookmarkResource;

class EditBookmark extends EditRecord
{
    protected static string $resource = BookmarkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
