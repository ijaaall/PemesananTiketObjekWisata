<h1>Tambah Data Pengguna</h1>

@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form action="{{ route('pengguna.store') }}" method="post">
    @csrf
    <label for="nama_pengguna">Nama Pengguna</label>
    <input type="text" name="nama_pengguna" id="nama_pengguna" value="{{ old('nama_pengguna') }}"><br>
    <label for="username">username</label>
    <input type="text" name="username" id="username" value="{{ old('username') }}"><br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="{{ old('password') }}"><br>
    <select name="role" id="role">
        <option value="" selected disabled hidden>-- Role --</option>
        <option value="admin" {{ old('role') == 'admin' ? 'checked' : '' }}>Admin</option>
        <option value="user" {{ old('role') == 'user' ? 'checked' : '' }} selected>User</option>
    </select>
    <button type="submit">Simpan</button>
    <button><a href="{{ route('pengguna.index') }}">Batal</a></button>
</form>
