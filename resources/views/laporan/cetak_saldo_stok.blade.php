<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Saldo Stok</title>
    <style>
        table,
        th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    
    </style>
    
</head>
<body>

    <div style="text-align: center;">
        <h3 >Laporan Saldo Stok Barang</h3>
    <p >Tanggal : {{tanggal_indonesia($tgl_awal, false)}} s/d {{tanggal_indonesia($tgl_akhir, false)}}
    </p>
    </div>
    
    <table width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Awal</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($saldoStok as $stok)
            <tr>
                <td style="text-align: center;">{{$loop->iteration}}</td>
                <td style="text-align: center;">{{$stok->kode_aksesoris}}</td>
                <td style="text-align: center;">{{$stok->barang->nama_aksesoris}}</td>
                <td style="text-align: center;">{{$stok->barang->satuan}}</td>
                <td style="text-align: center;">{{ number_format($stok->barang->stok_awal ) }}</td>
    
                <td style="text-align: center;">{{ number_format($stok->total_masuk, $stok->total_masuk == intval($stok->total_masuk) ? 0 : 2) }}</td>
                <td style="text-align: center;"> {{ number_format($stok->total_keluar, $stok->total_keluar == intval($stok->total_keluar) ? 0 : 2) }}</td>
                <td style="text-align: center;">
                    @php
                    $saldo = ($stok->barang->stok_awal + $stok->total_masuk) - $stok->total_keluar;
                    // $saldo = $stok->total_masuk - $stok->total_keluar;
                    @endphp
                    {{ number_format($saldo, $saldo == intval($saldo) ? 0 : 2) }}
    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
