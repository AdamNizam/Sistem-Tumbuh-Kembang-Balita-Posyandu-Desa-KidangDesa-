<?php

namespace App\Filament\Resources\PertumbuhanResource\Pages;

use App\Filament\Resources\PertumbuhanResource;
use Filament\Resources\Pages\EditRecord;
use App\Models\Balita;
use Carbon\Carbon;

class EditPertumbuhan extends EditRecord
{
    protected static string $resource = PertumbuhanResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $balita = Balita::find($data['id_balita']);
        $umur = Carbon::parse($balita->tanggal_lahir)->age;

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
