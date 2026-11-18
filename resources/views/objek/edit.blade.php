<h1>Edit Data Objek</h1>
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

<form action="{{ route('objek.update', $objek->id_objek) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="nama_objek">Nama Objek</label>
    <input type="text" name="nama_objek" id="nama_objek" value="{{ old('nama_objek', $objek->nama_objek) }}"><br>

    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" cols="30" rows="3">{{ old('deskripsi', $objek->deskripsi) }}</textarea><br>

    <label for="harga">Harga</label>
    <input type="number" name="harga" id="harga" value="{{ old('harga', $objek->harga) }}"><br>

    <label for="gambar">Gambar</label>
    @if ($objek->gambar)
        <img style="width: 100px" src="{{ asset('storage/' . $objek->gambar) }}" alt="gambar lama" srcset="">
    @endif

    <input type="file" name="gambar" id="gambar" accept="image/*"><br>

    <label for="stok">Stok</label>
    <input type="number" name="stok" id="stok" value="{{ old('stok', $objek->stok) }}"><br>

    <button type="submit">Update</button>
</form>
