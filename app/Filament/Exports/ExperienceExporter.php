<?php

namespace App\Filament\Exports;

use App\Models\Experience;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class ExperienceExporter extends Exporter
{
    protected static ?string $model = Experience::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('position')
                ->label('Position'),
            ExportColumn::make('company_name')
                ->label('Company'),
            ExportColumn::make('date_from')
                ->label('Start date'),
            ExportColumn::make('date_to')
                ->label('End date'),
            ExportColumn::make('short_description')
                ->label('Description'),
            ExportColumn::make('created_at')
                ->label('Created at'),
            ExportColumn::make('updated_at')
                ->label('Updated at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Experience export completed. ' . number_format($export->successful_rows) . ' rows exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' rows failed to export.';
        }

        return $body;
    }
}
