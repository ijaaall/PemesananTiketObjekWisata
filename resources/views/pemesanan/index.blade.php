<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Data Pemesanan</h1>
    <hr>
    <a href="{{ route('pemesanan.create') }}">Tambah Data</a><br><br>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Pengguna</th>
                <th>Objek</th>
                <th>Nama Pemesan</th>
                <th>Jumlah</th>
                <th>Tanggal Tiket</th>
                <th>Jumlah Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesanan as $item)
                <tr>
                    <td>{{ $item->id_pemesanan }}</td>
                    <td>{{ $item->id_pengguna }}</td>
                    <td>{{ $item->id_objek }}</td>
                    <td>{{ $item->nama_pemesan }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->tanggal_tiket }}</td>
                    <td>{{ $item->jumlah_harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
