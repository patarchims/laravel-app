<?php

namespace App\Filament\Resources\ViewCpptExtendedResource\Pages;

use App\Filament\Resources\ViewCpptExtendedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditViewCpptExtended extends EditRecord
{
    protected static string $resource = ViewCpptExtendedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
