<?php

namespace App\Filament\Resources\PertumbuhanResource\Pages;

use App\Filament\Resources\PertumbuhanResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListPertumbuhans extends ListRecords
{
    protected static string $resource = PertumbuhanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
    