<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Objek Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-white: #FFFFFF;
            --ocean-teal: #0f766e;
            --ocean-teal-accent: #008080;
            --ocean-teal-dark: #006666;
            --warm-coral: #FF6B6B;
            --warm-coral-dark: #e85858;
            --text-slate: #1e293b;
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

        .form-card {
            max-width: 640px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid rgba(0, 128, 128, 0.18);
            border-top: 4px solid var(--ocean-teal-accent);
            border-radius: 16px;
            box-shadow: 0 16px 35px -12px rgba(15, 23, 42, 0.12);
        }

        .page-heading {
            color: var(--ocean-teal-dark);
            font-weight: 700;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--ocean-teal-accent);
            box-shadow: 0 0 0 0.2rem rgba(0, 128, 128, 0.16);
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
        <div class="card form-card">
            <div class="card-body p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="badge rounded-pill px-3 py-2" style="background-color:#ccfbf1;color:#0f766e;">Wisata
                        &amp; Perjalanan</span>
                    <a href="{{ route('objek.index') }}" class="btn btn-outline-secondary btn-sm">← Kembali</a>
                </div>

                <h1 class="h4 page-heading mt-2 mb-3">Edit Data Objek</h1>
                <hr class="mb-4">

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('objek.update', $objek->id_objek) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_objek" class="form-label fw-semibold">Nama Objek</label>
                        <input type="text" class="form-control" name="nama_objek" id="nama_objek"
                            value="{{ old('nama_objek', $objek->nama_objek) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="3" required>{{ old('deskripsi', $objek->deskripsi) }}</textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="harga" class="form-label fw-semibold">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga"
                                value="{{ old('harga', $objek->harga) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="stok" class="form-label fw-semibold">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok"
                                value="{{ old('stok', $objek->stok) }}" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label fw-semibold">Gambar</label>
                        @if ($objek->gambar)
                            <div class="mb-2">
                                <img class="rounded-3 border" style="width: 110px; height: 110px; object-fit: cover;"
                                    src="{{ asset('storage/' . $objek->gambar) }}" alt="gambar lama">
                            </div>
                        @endif
                        <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-coral w-100 py-2">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
