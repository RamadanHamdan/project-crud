<?php

namespace App\Filament\Resources\BarangResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use App\Filament\Resources\BarangResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBarang extends CreateRecord
{
    protected static string $resource = BarangResource::class;
 
    protected function getCreatedNotification(): ?Notification
{
    return Notification::make()
        ->success()
        ->title('Berhasil Dibuat')
        ->icon('heroicon-o-document-text')
        ->iconColor('danger')
        ->duration(2000)
        ->body('Data Barang Berhasil Dibuat');
}


}
