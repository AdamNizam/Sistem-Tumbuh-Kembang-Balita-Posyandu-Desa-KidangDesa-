<?php

namespace App\Filament\Resources\PertumbuhanResource\Pages;

use App\Filament\Resources\PertumbuhanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPertumbuhan extends EditRecord
{
    protected static string $resource = PertumbuhanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
