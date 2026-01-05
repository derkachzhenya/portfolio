<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Имя')
                    ->required(),
                TextInput::make('surname')
                    ->label('Фамилия'),
                TextInput::make('position')
                    ->label('Должность'),
                Textarea::make('description')
                    ->label('О себе')
                    ->columnSpanFull(),
                Textarea::make('interests')
                    ->label('Интересы')
                    ->columnSpanFull(),
            ]);
    }
}
