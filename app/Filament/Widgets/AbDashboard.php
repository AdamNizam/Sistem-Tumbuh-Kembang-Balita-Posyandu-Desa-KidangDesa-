<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AbDashboard extends BaseWidget
{
    protected function getStats(): array
    {
       return [
            Stat::make('Laki-Laki', '20')
                ->description('20')
                ->chart([7, 20, 10, 30, 15, 4, 14])
                ->color('primary'),
            Stat::make('Perempuan', '1')
                ->description('20')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
              Stat::make('Total Balita', '20 Kader')
                ->description('30')
                ->chart([7, 20, 10, 30, 15, 4, 14])
                ->color('warning'),
        ];

    }
}
