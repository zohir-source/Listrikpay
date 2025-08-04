<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Tagihan Belum Lunas</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: center;
        }
        thead {
            background-color: #f2b84b;
        }
    </style>
</head>
<body>

    <h2>Laporan Tagihan Belum Lunas</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor KWH</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Jumlah Meter</th>
                <th>Total Tagihan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tagihan as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->pelanggan->nama_pelanggan ?? 'Pelanggan dihapus' }}</td>
                    <td>{{ $item->pelanggan->nomor_kwh ?? '-' }}</td>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->jumlah_meter }}</td>
                    <td>
                        @php
                            $tarif = $item->pelanggan->tarif->tarifperkwh ?? 0;
                            $total = ($item->jumlah_meter * $tarif) + 2500;
                        @endphp
                        Rp{{ number_format($total, 0, ',', '.') }}
                    </td>
                    <td>{{ $item->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Data tidak tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>