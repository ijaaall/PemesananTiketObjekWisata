    <h2>Selamat Datang Admin {{ Auth::guard('pengguna')->user()->nama_pengguna }}</h2>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
