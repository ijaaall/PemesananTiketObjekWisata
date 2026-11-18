    <h2>Selamat Datang Di Pemesanan Tiket Objek Wisata {{ Auth::guard('pengguna')->user()->nama_pengguna }}</h2>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex dolores corporis provident repudiandae amet dolorem
        esse minima consequatur laboriosam maiores!</p>

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
                    <td><img style="width: 50px" src="{{ asset('storage/' . $item->gambar) }}" alt="gambar objek"
                            srcset=""></td>
                    <td>{{ $item->stok }}</td>
                    <td><a href="{{ route('pemesanan.create') }}">Pesan</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
