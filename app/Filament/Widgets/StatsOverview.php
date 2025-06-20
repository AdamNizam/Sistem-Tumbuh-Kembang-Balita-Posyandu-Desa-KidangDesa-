<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Balita;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $jumlahLaki = Balita::where('jenis_kelamin', 'Laki-laki')->count();
        $jumlahPerempuan = Balita::where('jenis_kelamin', 'Perempuan')->count();
        $total = $jumlahLaki + $jumlahPerempuan;

        return [
            Stat::make('Laki-Laki', $jumlahLaki)
                ->description("Jumlah balita laki-laki")
                ->color('primary'),

            Stat::make('Perempuan', $jumlahPerempuan)
                ->description("Jumlah balita perempuan")
                ->color('danger'),

            Stat::make('Total Balita', $total)
                ->description("Total semua balita")
                ->color('warning'),
        ];
    }
}
