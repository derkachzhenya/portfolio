<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('link')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('projects/images')
                    ->disk('public')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
