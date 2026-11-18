<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>

<body>
    <h1>MY APLIKASI KU</h1>
    <ul>
        <li><button><a href="{{ route('pengguna.index') }}">Pengguna</a></button></li>
        <li><button><a href="{{ route('objek.index') }}">Objek</a></button></li>
        <li><button><a href="{{ route('pemesanan.index') }}">Pemesanan</a></button></li>
    </ul>
    {{--  menu navigasi ke [pengguna,objek,pemesanan] --}}
    <h2>Selamat Datang Admin {{ Auth::guard('pengguna')->user()->nama_pengguna }}</h2>
    <hr>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, repudiandae.</p><br><br>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

    {{-- daftar objekk wisata --}}
</body>

</html>
