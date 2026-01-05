<?php

namespace App\Filament\Resources\Technologies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class TechnologyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                FileUpload::make('icon')
                    ->label('Иконка')
                    ->image()
                    ->directory('technologies/icons')
                    ->disk('public')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    /**
     * Heroicon names that Filament can render by storing the icon string.
     */
    protected static function iconOptions(): array
    {
        return [
            'heroicon-o-code-bracket' => 'Code Bracket',
            'heroicon-o-cpu-chip' => 'CPU Chip',
            'heroicon-o-server' => 'Server',
            'heroicon-o-sparkles' => 'Sparkles',
            'heroicon-o-wrench-screwdriver' => 'Wrench & Screwdriver',
        ];
    }
}
