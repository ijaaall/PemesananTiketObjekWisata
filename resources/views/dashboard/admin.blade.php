<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard — Eksplorasi Wisata</title>
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
            --text-muted-slate: #475569;
        }

        body {
            background:
                radial-gradient(circle at 12% 15%, rgba(20, 184, 166, 0.14), transparent 38%),
                radial-gradient(circle at 88% 85%, rgba(255, 107, 107, 0.12), transparent 42%),
                linear-gradient(180deg, #f0fdfa 0%, #ffffff 45%, #f8fafc 100%);
            color: var(--text-slate);
            min-height: 100vh;
        }

        .navbar-custom {
            background-color: rgba(255, 255, 255, 0.94);
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
        }

        .nav-btn-teal {
            background-color: var(--ocean-teal-accent);
            border-color: var(--ocean-teal-accent);
            color: var(--bg-white);
            font-weight: 500;
            border-radius: 8px;
            transition: background-color 0.15s ease, transform 0.08s ease;
        }

        .nav-btn-teal:hover,
        .nav-btn-teal:focus {
            background-color: var(--ocean-teal-dark);
            border-color: var(--ocean-teal-dark);
            color: var(--bg-white);
            transform: translateY(-1px);
        }

        .btn-coral {
            background-color: var(--warm-coral);
            border-color: var(--warm-coral);
            color: var(--bg-white);
            font-weight: 600;
            border-radius: 8px;
            box-shadow: 0 6px 14px rgba(255, 107, 107, 0.25);
            transition: background-color 0.15s ease, transform 0.08s ease;
        }

        .btn-coral:hover,
        .btn-coral:focus {
            background-color: var(--warm-coral-dark);
            border-color: var(--warm-coral-dark);
            color: var(--bg-white);
            transform: translateY(-1px);
        }

        .dashboard-card {
            background-color: var(--bg-white);
            border: 1px solid rgba(0, 128, 128, 0.18);
            border-top: 4px solid var(--ocean-teal-accent);
            border-radius: 16px;
            box-shadow: 0 16px 35px -12px rgba(15, 23, 42, 0.12);
        }

        .welcome-heading {
            color: var(--ocean-teal-dark);
            font-weight: 700;
        }

        .welcome-subtext {
            color: var(--text-muted-slate);
            font-size: 0.9rem;
        }

        .divider-teal {
            border-color: rgba(0, 128, 128, 0.2);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom py-3">
        <div class="container">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <h1 class="h4 mb-0 brand-title">MY APLIKASI KU</h1>
                <span class="brand-badge">Wisata &amp; Perjalanan</span>
            </div>

            {{-- menu navigasi ke [pengguna,objek,pemesanan] --}}
            <ul class="navbar-nav flex-row flex-wrap gap-2 ms-lg-auto my-2 my-lg-0">
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
        </div>
    </nav>

    <div class="container py-5">
        <div class="card dashboard-card">
            <div class="card-body p-4 p-md-5">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                    <div>
                        <h2 class="h4 mb-1 welcome-heading">
                            Selamat Datang Admin {{ Auth::guard('pengguna')->user()->nama_pengguna }}
                        </h2>
                        <p class="mb-0 welcome-subtext">
                            Kelola data pengguna, destinasi objek wisata, dan pemesanan pengunjung.
                        </p>
                    </div>

                    <form action="{{ route('logout') }}" method="post" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-coral px-3 py-2">Logout</button>
                    </form>
                </div>

                <hr class="divider-teal my-4">

                <p class="mb-0 text-secondary">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, repudiandae.
                </p>

                {{-- daftar objekk wisata --}}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
