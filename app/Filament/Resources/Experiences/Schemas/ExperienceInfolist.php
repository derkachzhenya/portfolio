<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExperienceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('position'),
                TextEntry::make('short_description')
                    ->columnSpanFull(),
                TextEntry::make('date_from')
                    ->date(),
                TextEntry::make('date_to')
                    ->date(),
                TextEntry::make('company_name'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
