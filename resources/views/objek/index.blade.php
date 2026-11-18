<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Objek Wisata</title>
</head>

<body>
    <h1>Data Objek Wisata</h1>
    <hr>
    <a href="{{ route('objek.create') }}">Tambah Data</a><br><br>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Objek</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($objek as $item)
                <tr>
                    <td>{{ $item->id_objek }}</td>
                    <td>{{ $item->nama_objek }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->harga }}</td>
                    <td><img width="50px" src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_objek }}"
                            srcset="">
                    </td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <a href="{{ route('objek.edit', $item->id_objek) }}">Edit</a>
                        <form action="{{ route('objek.destroy', $item->id_objek) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
