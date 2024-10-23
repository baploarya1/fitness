<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Mutasi Stok Barang</title>
    <style>
        table{
            width: 100%;
            margin-bottom: 20px;
            page-break-inside:avoid;
        }

        table,
        th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            border-spacing: 0;
        }
    
    </style>
</head>
<body>

    <h3 style="text-align: center">Laporan Mutasi Stok Barang</h3>
    <p style="text-align: center">Tanggal :
        {{tanggal_indonesia($tgl_awal, false)}} s/d {{tanggal_indonesia($tgl_akhir, false)}}
    </p>
    @foreach ($mutasiStok as $kode_barang => $stok)

     <table >
        <thead>
            <tr style="font-size: 13px;">
                <th colspan="2" width="10%">{{$stok[0]->barang->kode_aksesoris}}</th>
                <th colspan="3" width="30%">{{$stok[0]->barang->nama_aksesoris}}</th>
                <th width="10%">{{$stok[0]->barang->satuan}}</th>


            </tr>

            <tr>
                <th width="5%" rowspan="2">No</th>
                <th rowspan="2">Tanggal</th>
                <th rowspan="2">Keterangan</th>
                <th colspan="2">Mutasi</th>
                <th rowspan="2">Stok Akhir</th>
            </tr>
            <tr>

                <th>Masuk</th>
                <th>Keluar</th>
            </tr>
        </thead>
        <tbody>
            @php
             $total =0;
            @endphp
            @foreach ($stok as $stok)
            @php
               
                if ($stok->jenis == 'MASUK') {
                    $total+=$stok->qty_satuan_kecil;
                }else{
                    $total-=$stok->qty_satuan_kecil;
                }
            @endphp
             <tr>
                <td style="text-align: center">{{$loop->iteration}}</td>
                <td style="text-align: center">{{tanggal_indonesia($stok->created_at,false)}}</td>
                <td style="text-align: center">{{$stok->keterangan}}</td>
                <td style="text-align: center">
                    @if($stok->jenis == 'MASUK')
                    {{ number_format($stok->qty_satuan_kecil, $stok->qty_satuan_kecil == intval($stok->qty_satuan_kecil) ? 0 : 2) }}
                    @else
                    0
                    @endif
                </td>
                <td style="text-align: center">
                    @if($stok->jenis == 'KELUAR')
                    {{ number_format($stok->qty_satuan_kecil, $stok->qty_satuan_kecil == intval($stok->qty_satuan_kecil) ? 0 : 2) }}
                    @else
                    0
                    @endif
                </td>
                <td style="text-align: center">{{  number_format($total, $total == intval($total) ? 0 : 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach

</body>
</html>
