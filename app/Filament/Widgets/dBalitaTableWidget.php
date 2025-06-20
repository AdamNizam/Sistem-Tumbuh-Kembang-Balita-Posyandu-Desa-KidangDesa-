<?php

namespace App\Filament\Widgets;

use App\Models\Jadwal;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class dBalitaTableWidget extends BaseWidget
{
    protected static ?string $heading = 'Jadwal Kegiatan Posyandu';

    protected int|string|array $columnSpan = 'full'; 

    public function table(Table $table): Table
    {
        return $table
            ->query(Jadwal::query()->latest()) 
            ->columns([
                TextColumn::make('kegiatan')
                    ->label('Kegiatan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),

                TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->searchable(),
            ]);
    }
}
