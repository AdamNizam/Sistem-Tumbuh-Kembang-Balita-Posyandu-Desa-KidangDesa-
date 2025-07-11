<?php

namespace App\Filament\Resources\PertumbuhanResource\Pages;

use App\Filament\Resources\PertumbuhanResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Balita;
use Carbon\Carbon;

class CreatePertumbuhan extends CreateRecord
{
    protected static string $resource = PertumbuhanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $balita = Balita::find($data['id_balita']);
        $umur = $balita->umur;

        $data['kategori_pertumbuhan'] = PertumbuhanResource::hitungKategori(
            $data['berat_badan'],
            $data['tinggi_badan'],
            $data['lingkar_kepala'],
            $umur,
            $balita->jenis_kelamin
        );

        return $data;
    }
}
