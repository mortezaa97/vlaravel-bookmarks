<?php

declare(strict_types=1);

namespace Mortezaa97\Bookmarks\Filament\Resources\Bookmarks\Schemas;

use Filament\Schemas\Schema;

class BookmarkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            \Filament\Schemas\Components\Group::make()
                ->schema([
                    \Filament\Schemas\Components\Section::make()
                        ->schema([
                            \App\Filament\Components\Form\UserSelect::create()->required(),
                            \App\Filament\Components\Form\ModelTypeSelect::create()->required(),
                            \Filament\Forms\Components\TextInput::make('model_id')->required()->maxLength(26),

                        ])
                        ->columns(12)
                        ->columnSpan(12),
                ])
                ->columns(12)
                ->columnSpan(8),
            \Filament\Schemas\Components\Group::make()
                ->schema([
                    \Filament\Schemas\Components\Section::make()
                        ->schema([])
                        ->columns(12)
                        ->columnSpan(12),
                ])
                ->columns(12)
                ->columnSpan(4),
        ])
            ->columns(12);
    }
}
