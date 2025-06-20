<?php

namespace App\Filament\Widgets;

use App\Models\Balita;
use Filament\Widgets\ChartWidget;

class BalitaPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Persentase Jumlah Balita';
    protected static string $color = 'primary';

    protected function getData(): array
    {
        $jumlahLaki = Balita::where('jenis_kelamin', 'Laki-laki')->count();
        $jumlahPerempuan = Balita::where('jenis_kelamin', 'Perempuan')->count();
        $total = $jumlahLaki + $jumlahPerempuan;

        $persenLaki = $total > 0 ? round(($jumlahLaki / $total) * 100, 2) : 0;
        $persenPerempuan = $total > 0 ? round(($jumlahPerempuan / $total) * 100, 2) : 0;

        return [
            'datasets' => [
                [
                    'label' => 'Persentase Balita',
                    'data' => [$persenLaki, $persenPerempuan],
                    'backgroundColor' => ['#3b82f6', '#10b981'],
                ],
            ],
            'labels' => ['Laki-laki', 'Perempuan'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut'; // Bisa juga 'pie'
    }
}

