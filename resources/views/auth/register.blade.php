<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Eksplorasi Wisata</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background:
                radial-gradient(circle at 15% 20%, rgba(255, 255, 255, 0.22), transparent 40%),
                radial-gradient(circle at 85% 80%, rgba(251, 146, 60, 0.25), transparent 45%),
                linear-gradient(135deg, #0f766e 0%, #0284c7 55%, #38bdf8 100%);
            padding: 20px 16px;
            color: #1e293b;
        }

        .register-card {
            width: 100%;
            max-width: 420px;
            background-color: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(8px);
            padding: 34px 32px;
            border-radius: 18px;
            box-shadow: 0 20px 40px -12px rgba(15, 23, 42, 0.28);
            border: 1px solid rgba(255, 255, 255, 0.7);
        }

        .register-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand-badge {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #0f766e;
            background-color: #ccfbf1;
            padding: 5px 10px;
            border-radius: 999px;
            margin-bottom: 10px;
        }

        .register-header h2 {
            font-size: 1.55rem;
            font-weight: 700;
            color: #0f172a;
        }

        .register-header p {
            font-size: 0.875rem;
            color: #475569;
            margin-top: 4px;
        }

        .success-message {
            background-color: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 0.875rem;
            margin-bottom: 16px;
        }

        .alert-danger {
            background-color: #fff1f2;
            color: #be123c;
            border: 1px solid #fecdd3;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 0.875rem;
            margin-bottom: 16px;
        }

        .alert-danger ul {
            margin-left: 18px;
        }

        .alert-danger li {
            margin-bottom: 4px;
        }

        .alert-danger li:last-child {
            margin-bottom: 0;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: #334155;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 11px 14px;
            font-size: 0.95rem;
            background-color: #f8fafc;
            color: #0f172a;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        select:focus {
            background-color: #ffffff;
            border-color: #0d9488;
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.18);
        }

        select {
            cursor: pointer;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px 16px;
            font-size: 0.95rem;
            font-weight: 600;
            color: #ffffff;
            background: linear-gradient(135deg, #ea580c 0%, #f97316 100%);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 8px;
            box-shadow: 0 8px 18px -6px rgba(234, 88, 12, 0.45);
            transition: filter 0.15s ease, transform 0.08s ease;
        }

        button[type="submit"]:hover {
            filter: brightness(1.05);
        }

        button[type="submit"]:active {
            transform: scale(0.99);
        }

        .login-link {
            margin-top: 22px;
            text-align: center;
            font-size: 0.875rem;
            color: #475569;
        }

        .login-link a {
            color: #0f766e;
            font-weight: 700;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="register-card">
        <div class="register-header">
            <span class="brand-badge">Wisata &amp; Perjalanan</span>
            <h2>Register</h2>
            <p>Buat akun baru untuk mulai menjelajah destinasi</p>
        </div>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
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

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama_pengguna">Nama Pengguna</label>
                <input type="text" name="nama_pengguna" id="nama_pengguna" value="{{ old('nama_pengguna') }}"
                    required autofocus>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" required>
                    <option value="" selected disabled hidden>-- Role --</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <button type="submit">Register</button>
        </form>

        <p class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</body>

</html>
