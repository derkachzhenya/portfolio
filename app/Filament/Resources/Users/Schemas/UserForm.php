<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('First name')
                    ->required(),
                TextInput::make('surname')
                    ->label('Last name'),
                TextInput::make('position')
                    ->label('Position'),
                Textarea::make('description')
                    ->label('About')
                    ->columnSpanFull(),
                Textarea::make('interests')
                    ->label('Interests')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Image')
                    ->columnSpanFull()
                    ->image(),
                TextInput::make('linkedin')
                    ->label('LinkedIn')
                    ->columnSpanFull(),
                TextInput::make('github')
                    ->label('GitHub')
                    ->columnSpanFull(),
                TextInput::make('gitlab')
                    ->label('GitLab')
                    ->columnSpanFull(),
                TextInput::make('telegram')
                    ->label('Telegram')
                    ->columnSpanFull(),
            ]);
    }
}
