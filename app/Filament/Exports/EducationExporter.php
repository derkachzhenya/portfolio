<?php

namespace App\Filament\Exports;

use App\Models\Education;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class EducationExporter extends Exporter
{
    protected static ?string $model = Education::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('title')
                ->label('Title'),
            ExportColumn::make('qualification')
                ->label('Qualification'),
            ExportColumn::make('program_name')
                ->label('Program name'),
            ExportColumn::make('date_from')
                ->label('Start date'),
            ExportColumn::make('date_to')
                ->label('End date'),
            ExportColumn::make('created_at')
                ->label('Created at'),
            ExportColumn::make('updated_at')
                ->label('Updated at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Education export completed. ' . number_format($export->successful_rows) . ' rows exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' rows failed to export.';
        }

        return $body;
    }
}
