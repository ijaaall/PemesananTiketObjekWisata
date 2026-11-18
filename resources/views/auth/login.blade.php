<h2>Login</h2>

@if (session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('login') }}" method="post">
    @csrf
    <label for="username">Username</label>
    <input type="text" name="username" id="username"><br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password"><br>
    <button type="submit">Login</button>
</form>

belum punya akun? <a href="{{ route('register') }}">Register</a>
