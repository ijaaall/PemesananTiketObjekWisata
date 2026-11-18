<h1>Tambah Data Objek</h1>
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('objek.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="nama_objek">Nama Objek</label>
    <input type="text" name="nama_objek" id="nama_objek" value="{{ old('nama_objek') }}"><br>

    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" cols="30" rows="3">{{ old('deskripsi') }}</textarea><br>

    <label for="harga">Harga</label>
    <input type="number" name="harga" id="harga" value="{{ old('harga') }}"><br>

    <label for="gambar">Gambar</label>
    <input type="file" name="gambar" id="gambar" accept="image/*"><br>

    <label for="stok">Stok</label>
    <input type="number" name="stok" id="stok" value="{{ old('stok') }}"><br>

    <button type="submit">Simpan</button>
</form>
