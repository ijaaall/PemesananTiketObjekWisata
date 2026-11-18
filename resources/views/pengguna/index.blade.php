<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengguna</title>
</head>

<body>
    <h1>Data Pengguna</h1>
    <hr>
    <button><a href="{{ route('pengguna.create') }}">Tambah Data</a></button><br><br>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengguna as $item)
                <tr>
                    <td>{{ $item->id_pengguna }}</td>
                    <td>{{ $item->nama_pengguna }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->role }}</td>
                    <td><button><a href="{{ route('pengguna.edit', $item->id_pengguna) }}">Edit</a></button>
                        <form action="{{ route('pengguna.destroy', $item->id_pengguna) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('hapus data ini??')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
