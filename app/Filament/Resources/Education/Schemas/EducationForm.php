<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required(),
                TextInput::make('qualification')->required(),
                TextInput::make('program_name')->required(),
            ]);
    }
}
