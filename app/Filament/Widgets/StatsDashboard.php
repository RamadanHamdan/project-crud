<?php

namespace App\Filament\Widgets;

use App\Models\Barang;
use App\Models\FakturModel;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        $countFaktur = FakturModel::count();
        $countBarang = Barang::count();
        return [
            Stat::make('Jumlah Faktur', $countFaktur . ' Faktur')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Jumlah Barang', $countBarang . ' Barang')
                ->descriptionIcon('heroicon-m-arrow-trending-down'),
            Stat::make('Average time on page', '3:12')
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
