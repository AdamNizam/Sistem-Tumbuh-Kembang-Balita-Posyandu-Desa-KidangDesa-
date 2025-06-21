<?php

namespace App\Filament\Resources\BalitaResource\Pages;

use App\Filament\Resources\BalitaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class CreateBalita extends CreateRecord
{
    protected static string $resource = BalitaResource::class;

     protected function mutateFormDataBeforeCreate(array $data): array
    {
        
        Log::debug('Data Yang Diterima:', $data);

        $tanggalLahir = Carbon::parse($data['tanggal_lahir']);
        $umur = $tanggalLahir->diff(Carbon::now());

        $umurString = '';
        if ($umur->y > 0) {
            $umurString .= $umur->y . ' tahun ';
        }
        if ($umur->m > 0) {
            $umurString .= $umur->m . ' bulan';
        }
        $data['umur'] = trim($umurString);

        Log::debug('Data sebelum disimpan:', $data);

        return $data;
    }
}
