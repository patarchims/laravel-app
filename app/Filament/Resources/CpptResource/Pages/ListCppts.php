<?php

namespace App\Filament\Resources\CpptResource\Pages;

use App\Filament\Resources\CpptResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCppts extends ListRecords
{
    protected static string $resource = CpptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
