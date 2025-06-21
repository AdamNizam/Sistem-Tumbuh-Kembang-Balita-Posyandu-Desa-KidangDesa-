<?php

namespace App\Filament\Resources\BalitaResource\Pages;

use App\Filament\Resources\BalitaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Balita;
use Illuminate\Support\Carbon;
use Filament\Actions\Action;

class ListBalitas extends ListRecords
{
    protected static string $resource = BalitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

            Action::make('refreshAge')
                ->label('Hitung Ulang Umur')
                ->icon('heroicon-m-arrow-path')
                ->color('secondary')
                ->requiresConfirmation()
                ->action(function () {
                    $balitas = Balita::all();

                    foreach ($balitas as $balita) {
                        $umur = Carbon::parse($balita->tanggal_lahir)->diff(Carbon::now());

                        $umurString = '';
                        if ($umur->y > 0) {
                            $umurString .= $umur->y . ' tahun ';
                        }
                        if ($umur->m > 0) {
                            $umurString .= $umur->m . ' bulan';
                        }

                        $balita->umur = trim($umurString);
                        $balita->save();
                    }

                    $this->notify('success', 'Umur semua balita berhasil diperbarui!');
                }),
        ];
    }
}
