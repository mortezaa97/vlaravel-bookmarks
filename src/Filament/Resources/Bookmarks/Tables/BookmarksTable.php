<?php

declare(strict_types=1);

namespace Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;

class BookmarksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(fn (): \Illuminate\Database\Eloquent\Builder => \Mortezaa97\Bookmarks\Models\Bookmark::query())
            ->columns([
                \App\Filament\Components\Table\UserTextColumn::create(),
                \App\Filament\Components\Table\ModelTypeTextColumn::create(),
                \App\Filament\Components\Table\ModelTextColumn::create(),
                \App\Filament\Components\Table\DeletedAtTextColumn::create(),
                \App\Filament\Components\Table\CreatedAtTextColumn::create(),
                \App\Filament\Components\Table\UpdatedAtTextColumn::create(),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
