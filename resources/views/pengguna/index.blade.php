<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengguna — Kumpulan Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-white: #FFFFFF;
            --bg-soft: #f0fdfa;
            --ocean-teal: #0f766e;
            --ocean-teal-accent: #008080;
            --ocean-teal-dark: #006666;
            --warm-coral: #FF6B6B;
            --warm-coral-dark: #e85858;
            --text-slate: #1e293b;
            --text-muted-slate: #64748b;
        }

        body {
            background:
                radial-gradient(circle at 12% 15%, rgba(20, 184, 166, 0.14), transparent 38%),
                radial-gradient(circle at 88% 85%, rgba(255, 107, 107, 0.12), transparent 42%),
                linear-gradient(180deg, #f0fdfa 0%, #f8fafc 50%, #ffffff 100%);
            color: var(--text-slate);
            min-height: 100vh;
            padding-bottom: 48px;
        }

        .navbar-custom {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border-bottom: 2px solid rgba(0, 128, 128, 0.16);
            box-shadow: 0 6px 20px rgba(15, 118, 110, 0.08);
        }

        .brand-badge {
            display: inline-block;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--ocean-teal);
            background-color: #ccfbf1;
            padding: 4px 10px;
            border-radius: 999px;
        }

        .brand-title {
            color: var(--ocean-teal-dark);
            font-weight: 700;
            letter-spacing: 0.4px;
            text-decoration: none;
        }

        .brand-title:hover,
        .brand-title:focus {
            color: var(--ocean-teal-accent);
        }

        .nav-btn-teal {
            background-color: var(--ocean-teal-accent);
            border-color: var(--ocean-teal-accent);
            color: var(--bg-white);
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.15s ease;
        }

        .nav-btn-teal:hover,
        .nav-btn-teal:focus {
            background-color: var(--ocean-teal-dark);
            border-color: var(--ocean-teal-dark);
            color: var(--bg-white);
            transform: translateY(-1px);
        }

        .page-card {
            background-color: var(--bg-white);
            border: 1px solid rgba(0, 128, 128, 0.18);
            border-top: 4px solid var(--ocean-teal-accent);
            border-radius: 16px;
            box-shadow: 0 16px 35px -12px rgba(15, 23, 42, 0.12);
        }

        .page-title {
            color: var(--ocean-teal-dark);
            font-weight: 700;
        }

        .btn-teal {
            background-color: var(--ocean-teal-accent);
            border-color: var(--ocean-teal-accent);
            color: var(--bg-white);
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.15s ease;
        }

        .btn-teal:hover,
        .btn-teal:focus {
            background-color: var(--ocean-teal-dark);
            border-color: var(--ocean-teal-dark);
            color: var(--bg-white);
        }

        .btn-coral {
            background-color: var(--warm-coral);
            border-color: var(--warm-coral);
            color: var(--bg-white);
            font-weight: 600;
            border-radius: 8px;
            box-shadow: 0 6px 14px rgba(255, 107, 107, 0.22);
            transition: all 0.15s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-coral:hover,
        .btn-coral:focus {
            background-color: var(--warm-coral-dark);
            border-color: var(--warm-coral-dark);
            color: var(--bg-white);
            transform: translateY(-1px);
        }

        .btn-outline-teal {
            color: var(--ocean-teal-dark);
            border-color: rgba(0, 128, 128, 0.35);
            background-color: #ffffff;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-outline-teal:hover {
            background-color: #f0fdfa;
            border-color: var(--ocean-teal-accent);
            color: var(--ocean-teal-dark);
        }

        .account-card {
            background-color: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 14px;
            padding: 18px;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.05);
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .account-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 28px rgba(0, 128, 128, 0.13);
            border-color: rgba(0, 128, 128, 0.32);
        }

        .account-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0f766e 0%, #2dd4bf 100%);
            color: #ffffff;
            font-weight: 700;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 6px 14px rgba(15, 118, 110, 0.22);
        }

        .account-name {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .account-username {
            font-size: 0.85rem;
            color: var(--text-muted-slate);
        }

        .role-badge {
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 4px 10px;
            border-radius: 999px;
        }

        .role-admin {
            background-color: #ffe4e6;
            color: #be123c;
        }

        .role-user {
            background-color: #ccfbf1;
            color: #0f766e;
        }

        .account-meta {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 12px;
            font-size: 0.8rem;
            color: var(--text-muted-slate);
            margin-top: 14px;
            margin-bottom: 14px;
        }

        .account-actions {
            display: flex;
            gap: 8px;
            margin-top: auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom py-3">
        <div class="container">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <a href="{{ url('/dashboard') }}" class="navbar-brand mb-0 h4 brand-title">MY APLIKASI KU</a>
                <span class="brand-badge">Wisata &amp; Perjalanan</span>
            </div>

            <div class="d-flex flex-wrap align-items-center gap-2 ms-lg-auto my-2 my-lg-0">
                <ul class="navbar-nav flex-row flex-wrap gap-2">
                    <li class="nav-item">
                        <a href="{{ route('pengguna.index') }}" class="btn btn-sm nav-btn-teal px-3">Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('objek.index') }}" class="btn btn-sm nav-btn-teal px-3">Objek</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pemesanan.index') }}" class="btn btn-sm nav-btn-teal px-3">Pemesanan</a>
                    </li>
                </ul>

                <form action="{{ route('logout') }}" method="post" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-coral px-3" title="Logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" aria-hidden="true">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <circle cx="15" cy="7" r="2" />
                            <path d="m14 11-2 4 3 2-1 4" />
                            <path d="m17 13-2-2" />
                            <path d="m19 12 3 3-3 3" />
                            <path d="M15 15h7" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-5">

        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <div class="card page-card">
            <div class="card-body p-4 p-md-5">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-3">
                    <div>
                        <h1 class="h3 mb-1 page-title">Kumpulan Akun Pengguna</h1>
                        <p class="text-muted mb-0" style="font-size: 0.9rem;">
                            Total {{ $pengguna->count() }} akun terdaftar pada sistem wisata.
                        </p>
                    </div>
                    <a href="{{ route('pengguna.create') }}" class="btn btn-teal px-3 py-2">+ Tambah Akun</a>
                </div>

                <hr class="mb-4">

                @if ($pengguna->isEmpty())
                    <div class="text-center py-5">
                        <p class="text-muted mb-3">Belum ada akun pengguna yang terdaftar.</p>
                        <a href="{{ route('pengguna.create') }}" class="btn btn-teal px-4">+ Tambah Akun Baru</a>
                    </div>
                @else
                    <div class="row g-3 g-md-4">
                        @foreach ($pengguna as $item)
                            @php
                                $inisial = strtoupper(substr($item->nama_pengguna, 0, 2));
                                $isAdmin = strtolower($item->role) === 'admin';
                            @endphp

                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="account-card">
                                    <div class="d-flex justify-content-between align-items-start gap-2">
                                        <div class="d-flex align-items-center gap-3 min-w-0">
                                            <div class="account-avatar">{{ $inisial }}</div>
                                            <div class="min-w-0">
                                                <h2 class="account-name text-truncate"
                                                    title="{{ $item->nama_pengguna }}">
                                                    {{ $item->nama_pengguna }}
                                                </h2>
                                                <div class="account-username text-truncate">
                                                    &#64;{{ $item->username }}
                                                </div>
                                            </div>
                                        </div>

                                        <span class="role-badge {{ $isAdmin ? 'role-admin' : 'role-user' }}">
                                            {{ $item->role }}
                                        </span>
                                    </div>

                                    <div class="account-meta d-flex justify-content-between align-items-center">
                                        <span>ID Akun</span>
                                        <strong class="text-dark">#{{ $item->id_pengguna }}</strong>
                                    </div>

                                    <div class="account-actions">
                                        <a href="{{ route('pengguna.edit', $item->id_pengguna) }}"
                                            class="btn btn-sm btn-outline-teal flex-fill">Edit Akun</a>
                                        <form action="{{ route('pengguna.destroy', $item->id_pengguna) }}"
                                            method="post" class="flex-fill m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-coral w-100"
                                                onclick="return confirm('hapus data ini??')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
