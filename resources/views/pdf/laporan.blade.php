<!DOCTYPE html>
<html>
<head>
    <title>Laporan Laporan Terpilih</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        h2 { text-align: center; margin-bottom: 5px; }
        .logo-container {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo {
            width: 80px; /* ukuran logo */
        }
    </style>
</head>
<body>

    <!-- Logo di atas judul -->
    <div class="logo-container">
        <img src="{{ public_path('images/logo-posyandu.png') }}" alt="Logo" class="logo">
    </div>

    <h2>Laporan Kegiatan Posyandu</h2>

    <table>
        <thead>
            <tr>
                <th>Periode</th>
                <th>Isi Laporan</th>
                <th>Nama Balita</th>
                <th>Nama Orang Tua</th>
                <th>Alamat</th>
                <th>Umur (Bulan)</th>
                <th>Kategori Pertumbuhan</th>
                <th>Kegiatan</th>
                <th>Tanggal Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->periode }}</td>
                    <td>{{ $item->isi_laporan }}</td>
                    <td>{{ $item->balita->nama_balita }}</td>
                    <td>{{ $item->balita->nama_orang_tua }}</td>
                    <td>{{ $item->balita->alamat }}</td>
                    <td>{{ $item->balita->umur }}</td>
                    <td>{{ $item->pertumbuhan->kategori_pertumbuhan ?? '-' }}</td>
                    <td>{{ $item->jadwal->kegiatan ?? '-' }}</td>
                    <td>
                        @if($item->jadwal && $item->jadwal->tanggal)
                            {{ \Carbon\Carbon::parse($item->jadwal->tanggal)->format('d-m-Y') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
