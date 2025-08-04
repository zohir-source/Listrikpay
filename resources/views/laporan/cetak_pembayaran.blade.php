<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Pembayaran</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 4px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Pembayaran - ListrikPay</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>No KWH</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Tanggal Bayar</th>
                <th>Biaya Admin</th>
                <th>Total Bayar</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->tagihan->pelanggan->nama_pelanggan }}</td>
                    <td>{{ $item->tagihan->pelanggan->nomor_kwh }}</td>
                    <td>{{ $item->tagihan->bulan }}</td>
                    <td>{{ $item->tagihan->tahun }}</td>
                    <td>{{ $item->tanggal_pembayaran }}</td>
                    <td>Rp{{ number_format($item->biaya_admin) }}</td>
                    <td>Rp{{ number_format($item->total_bayar) }}</td>
                    <td>{{ $item->user->nama_admin ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>