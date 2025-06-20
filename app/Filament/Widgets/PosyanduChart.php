<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;

class PosyanduChart extends ChartWidget
{
    protected static ?string $heading = 'Persentase Laporan Status Balita';


    protected function getData(): array
    {
        $data = Laporan::select('pertumbuhan.kategori_pertumbuhan', DB::raw('COUNT(*) as jumlah'))
            ->join('pertumbuhan', 'laporan.id_pertumbuhan', '=', 'pertumbuhan.id')
            ->groupBy('pertumbuhan.kategori_pertumbuhan')
            ->pluck('jumlah', 'pertumbuhan.kategori_pertumbuhan');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Anak per Kategori Pertumbuhan',
                    'data' => $data->values()->toArray(),
                ],
            ],
            'labels' => $data->keys()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
