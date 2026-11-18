<h2>Register</h2>

@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form action="{{ route('register') }}" method="post">
    @csrf
    <label for="nama_pengguna">Nama Pengguna</label>
    <input type="text" name="nama_pengguna" id="nama_pengguna"><br>
    <label for="username">username</label>
    <input type="text" name="username" id="username"><br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password"><br>
    <select name="role" id="role">
        <option value="" selected disabled hidden>-- Role --</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
    <button type="submit">Register</button>
</form>

sudah punya akun? <a href="{{ route('login') }}">Login</a>
