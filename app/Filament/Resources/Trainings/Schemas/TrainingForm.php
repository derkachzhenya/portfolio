<?php

namespace App\Filament\Resources\Trainings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TrainingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('qualification')
                    ->required(),
                TextInput::make('program_name')
                    ->required(),
                DatePicker::make('date_from')
                    ->required(),
                DatePicker::make('date_to')
                    ->required(),
            ]);
    }
}
