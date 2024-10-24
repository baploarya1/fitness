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
    .text-center{
        text-align: center
    }
    </style>
</head>
<body>

    <h3 style="text-align: center">Laporan Member Gym</h3>
    <p style="text-align: center">Tanggal :
        {{tanggal_indonesia($tgl_awal, false)}} s/d {{tanggal_indonesia($tgl_akhir, false)}}
    </p>
    <table>
        <thead>
            <tr>
                <th style="width: 3%" class="text-center">No</th>
                <th style="width: 12%"class="text-center">Kode Member</th>
                <th class="text-center">No Transaksi</th>
                <th class="text-center">Nama Member</th>
                <th style="width: 12%" class="text-center">Tanggal Transaksi</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Paket</th>
                <th class="text-center">Harga</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($transaksis as $no => $transaksi)
            
            @php $total += $transaksi->paket->harga_paket; @endphp
            <tr>
                <td class="text-center">{{$no+1}}</td>
                <td class="text-center">{{$transaksi->member->nomor_member}}</td>
                <td class="text-center">{{$transaksi->nomor_transaksi}}</td>
                <td class="text-center">{{$transaksi->member->nama_member}}</td>
                <td class="text-center">{{tanggal_indonesia($transaksi->tanggal_transaksi)}}</td>
                <td class="text-center">{{isset($transaksi->kategori)?$transaksi->kategori->nama_kategori:$transaksi->paket->kategori->nama_kategori}}</td>
                <td class="text-center">{{$transaksi->paket->nama_paket}}</td>
                <td class="text-center">{{formatRupiah($transaksi->paket->harga_paket)}} </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="7" class="text-center">TOTAL :</td>
                <td  class="text-center">{{formatRupiah($total)}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
