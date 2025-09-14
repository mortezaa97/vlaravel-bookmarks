<?php

declare(strict_types=1);

namespace Mortezaa97\Bookmarks\Filament\Resources\Bookmarks;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\Pages\CreateBookmark;
use Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\Pages\EditBookmark;
use Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\Pages\ListBookmarks;
use Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\Schemas\BookmarkForm;
use Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\Tables\BookmarksTable;
use Mortezaa97\Bookmarks\Models\Bookmark;
use UnitEnum;

class BookmarkResource extends Resource
{
    protected static ?string $model = Bookmark::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'نشان‌شده‌ها';

    protected static ?string $modelLabel = 'نشان‌شده';

    protected static ?string $pluralModelLabel = 'نشان‌شده‌ها';

    protected static string|null|UnitEnum $navigationGroup = 'بلاگ';

    public static function form(Schema $schema): Schema
    {
        return BookmarkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BookmarksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBookmarks::route('/'),
            'create' => CreateBookmark::route('/create'),
            'edit' => EditBookmark::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
