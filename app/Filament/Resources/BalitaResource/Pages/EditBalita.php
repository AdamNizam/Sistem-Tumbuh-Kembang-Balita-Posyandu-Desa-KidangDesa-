<?php

namespace App\Filament\Resources\BalitaResource\Pages;

use App\Filament\Resources\BalitaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class EditBalita extends EditRecord
{
    protected static string $resource = BalitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Hitung ulang umur berdasarkan tanggal lahir
        $tanggalLahir = Carbon::parse($data['tanggal_lahir']);
        $umur = $tanggalLahir->diff(Carbon::now());

        // Format umur menjadi string
        $umurString = '';
        if ($umur->y > 0) {
            $umurString .= $umur->y . ' tahun ';
        }
        if ($umur->m > 0) {
            $umurString .= $umur->m . ' bulan';
        }

        Log::debug('Data sebelum disimpan (edit):', $data);

        $data['umur'] = trim($umurString);

        return $data;
    }
}
