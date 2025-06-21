<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; }
        h2 {
            text-align: center;
            margin-top: 0;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo {
            width: 100px; /* Sesuaikan ukuran logo */
        }
    </style>
</head>
<body>

    <!-- Logo di tengah -->
    <div class="logo-container">
        <img src="{{ public_path('images/logo-posyandu.png') }}" alt="Logo" class="logo">
    </div>

    <h2>Laporan Pertumbuhan Balita</h2>

    <table>
        <thead>
            <tr>
                <th>Nama Balita</th>
                <th>Umur (Bulan)</th>
                <th>Jenis Kelamin</th>
                <th>BB (kg)</th>
                <th>TB (cm)</th>
                <th>LK (cm)</th>
                <th>Kategori</th>
                <th>Tgl Pemeriksaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->balita->nama_balita }}</td>
                    <td>{{ $item->balita->umur }}</td>
                    <td>{{ $item->balita->jenis_kelamin }}</td>
                    <td>{{ $item->berat_badan }}</td>
                    <td>{{ $item->tinggi_badan }}</td>
                    <td>{{ $item->lingkar_kepala }}</td>
                    <td>{{ $item->kategori_pertumbuhan }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_input)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
