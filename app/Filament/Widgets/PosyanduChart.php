<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class PosyanduChart extends ChartWidget
{
    protected static ?string $heading = 'Persentase Laporan Status Balita';

    protected function getData(): array
    {
        // Data dummy IMT acak untuk 50 anak
        $dataImt = collect(range(1, 50))->map(function () {
            return rand(130, 400) / 10; 
        });
        $kategoriCounts = [
            'Obesitas' => 0,
            'Kelebihan Berat' => 0,
            'Normal' => 0,
            'Kurus' => 0,
        ];

        foreach ($dataImt as $imt) {
            $kategori = match (true) {
                $imt >= 30 => 'Obesitas',
                $imt >= 25 => 'Kelebihan Berat',
                $imt >= 18.5 => 'Normal',
                default => 'Kurus',
            };
            $kategoriCounts[$kategori]++;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Anak',
                    'data' => array_values($kategoriCounts),
                    'backgroundColor' => ['#f87171', '#fb923c', '#34d399', '#60a5fa'],
                ],
            ],
            'labels' => array_keys($kategoriCounts),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Bisa diganti ke 'pie' atau 'doughnut' jika ingin
    }
}
