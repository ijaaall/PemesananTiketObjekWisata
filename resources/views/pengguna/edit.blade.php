<h1>Edit Data Pengguna</h1>

{{-- @if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif --}}

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $er)
            <li>{{ $er }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('pengguna.update', $pengguna->id_pengguna) }}" method="post">
    @csrf
    @method('PUT')
    <label for="nama_pengguna">Nama Pengguna</label>
    <input type="text" name="nama_pengguna" id="nama_pengguna"
        value="{{ old('nama_pengguna', $pengguna->nama_pengguna) }}"><br>
    <label for="username">username</label>
    <input type="text" name="username" id="username" value="{{ old('username', $pengguna->username) }}"><br>
    <select name="role" id="role">
        <option value="" selected disabled hidden>-- Role --</option>
        <option value="admin" {{ old('role', $pengguna->role) == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="user" {{ old('role', $pengguna->role) == 'user' ? 'selected' : '' }}>User</option>
    </select>
    <button type="submit">Simpan</button>
</form>
