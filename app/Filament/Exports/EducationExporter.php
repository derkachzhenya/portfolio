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
                ->label('Название'),
            ExportColumn::make('qualification')
                ->label('Квалификация'),
            ExportColumn::make('program_name')
                ->label('Название программы'),
            ExportColumn::make('date_from')
                ->label('Дата начала'),
            ExportColumn::make('date_to')
                ->label('Дата окончания'),
            ExportColumn::make('created_at')
                ->label('Создано'),
            ExportColumn::make('updated_at')
                ->label('Обновлено'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Экспорт образования завершен. ' . number_format($export->successful_rows) . ' записей экспортировано.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' записей не удалось экспортировать.';
        }

        return $body;
    }
}

