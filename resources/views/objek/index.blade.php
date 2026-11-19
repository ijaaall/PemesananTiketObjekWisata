<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Objek Wisata — Kelola Katalog Admin</title>
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
                radial-gradient(circle at 10% 10%, rgba(20, 184, 166, 0.12), transparent 36%),
                radial-gradient(circle at 90% 85%, rgba(255, 107, 107, 0.1), transparent 40%),
                linear-gradient(180deg, #f0fdfa 0%, #f8fafc 45%, #ffffff 100%);
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

        .shopee-card {
            background-color: var(--bg-white);
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.05);
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .shopee-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(0, 128, 128, 0.14);
            border-color: rgba(0, 128, 128, 0.35);
        }

        .shopee-img-wrap {
            position: relative;
            width: 100%;
            aspect-ratio: 4 / 3;
            background-color: #e6f4f1;
            overflow: hidden;
        }

        .shopee-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .stock-tag {
            position: absolute;
            bottom: 8px;
            right: 8px;
            background-color: rgba(15, 23, 42, 0.75);
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 999px;
            backdrop-filter: blur(4px);
        }

        .stock-tag.habis {
            background-color: rgba(220, 38, 38, 0.9);
        }

        .shopee-body {
            padding: 14px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .destinasi-title {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .destinasi-desc {
            font-size: 0.82rem;
            color: var(--text-muted-slate);
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 2.45rem;
        }

        .price-text {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--warm-coral-dark);
            margin-bottom: 12px;
        }

        .admin-actions {
            display: flex;
            gap: 8px;
            margin-top: auto;
            padding-top: 10px;
            border-top: 1px dashed #e2e8f0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom py-3 mb-4">
        <div class="container">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <a href="{{ url('/dashboard') }}" class="navbar-brand mb-0 h4 brand-title">MY APLIKASI KU</a>
                <span class="brand-badge">Admin Katalog</span>
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

    <main class="container">

        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h1 class="h3 mb-1 page-title">Data Objek Wisata</h1>
                <small class="text-muted">{{ $objek->count() }} objek wisata tersedia di katalog</small>
            </div>
            <a href="{{ route('objek.create') }}" class="btn btn-teal px-3 py-2">+ Tambah Data</a>
        </div>

        @if ($objek->isEmpty())
            <div class="text-center bg-white p-5 rounded-4 border shadow-sm">
                <h2 class="h5 fw-bold text-secondary mb-2">Belum ada data objek wisata</h2>
                <p class="text-muted mb-3">Klik tombol di bawah untuk menambahkan data objek wisata baru.</p>
                <a href="{{ route('objek.create') }}" class="btn btn-teal px-4">+ Tambah Data</a>
            </div>
        @else
            <div class="row g-3 g-md-4">
                @foreach ($objek as $item)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="shopee-card">
                            <div class="shopee-img-wrap">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_objek }}">
                                <span class="stock-tag {{ $item->stok <= 0 ? 'habis' : '' }}">
                                    {{ $item->stok > 0 ? 'Stok: ' . $item->stok : 'Habis' }}
                                </span>
                            </div>

                            <div class="shopee-body">
                                <div class="mb-1">
                                    <span class="badge rounded-pill text-bg-light border text-secondary"
                                        style="font-size: 0.7rem;">
                                        ID #{{ $item->id_objek }}
                                    </span>
                                </div>

                                <h2 class="destinasi-title" title="{{ $item->nama_objek }}">
                                    {{ $item->nama_objek }}
                                </h2>

                                <p class="destinasi-desc" title="{{ $item->deskripsi }}">
                                    {{ $item->deskripsi }}
                                </p>

                                <div class="price-text">
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </div>

                                <div class="admin-actions">
                                    <a href="{{ route('objek.edit', $item->id_objek) }}"
                                        class="btn btn-outline-teal btn-sm flex-fill">
                                        Edit
                                    </a>
                                    <form action="{{ route('objek.destroy', $item->id_objek) }}" method="post"
                                        class="flex-fill m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-coral btn-sm w-100"
                                            onclick="return confirm('hapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
