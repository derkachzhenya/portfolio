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
                ->label('Должность'),
            ExportColumn::make('company_name')
                ->label('Компания'),
            ExportColumn::make('date_from')
                ->label('Дата начала'),
            ExportColumn::make('date_to')
                ->label('Дата окончания'),
            ExportColumn::make('short_description')
                ->label('Описание'),
            ExportColumn::make('created_at')
                ->label('Создано'),
            ExportColumn::make('updated_at')
                ->label('Обновлено'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Экспорт опыта работы завершен. ' . number_format($export->successful_rows) . ' записей экспортировано.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' записей не удалось экспортировать.';
        }

        return $body;
    }
}

