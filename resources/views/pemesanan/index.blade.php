<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pemesanan — Admin Wisata</title>
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
            gap: 6px;
        }

        .btn-coral:hover,
        .btn-coral:focus {
            background-color: var(--warm-coral-dark);
            border-color: var(--warm-coral-dark);
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

        .summary-chip {
            background-color: #f0fdfa;
            border: 1px solid rgba(0, 128, 128, 0.2);
            border-radius: 12px;
            padding: 10px 14px;
        }

        .summary-label {
            font-size: 0.75rem;
            color: var(--text-muted-slate);
            display: block;
        }

        .summary-value {
            font-size: 1rem;
            font-weight: 700;
            color: var(--ocean-teal-dark);
        }

        .table-teal-head th {
            background-color: var(--ocean-teal-accent);
            color: var(--bg-white);
            border-color: var(--ocean-teal-dark);
            font-weight: 600;
            font-size: 0.875rem;
            white-space: nowrap;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 128, 128, 0.05);
        }

        .buyer-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0f766e 0%, #2dd4bf 100%);
            color: #ffffff;
            font-size: 0.78rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .qty-pill {
            background-color: #ccfbf1;
            color: #0f766e;
            font-weight: 700;
            font-size: 0.8rem;
            padding: 4px 10px;
            border-radius: 999px;
            display: inline-block;
        }

        .price-total {
            color: var(--warm-coral-dark);
            font-weight: 800;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom py-3">
        <div class="container">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <a href="{{ url('/dashboard') }}" class="navbar-brand mb-0 h4 brand-title">MY APLIKASI KU</a>
                <span class="brand-badge">Admin Pemesanan</span>
            </div>

            {{-- menu navigasi ke [pengguna,objek,pemesanan] + logout --}}
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
                        {{-- Ikon orang berjalan keluar pintu --}}
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
        <div class="card page-card">
            <div class="card-body p-4 p-md-5">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
                    <div>
                        <h1 class="h3 mb-1 page-title">Data Pemesanan Masuk</h1>
                        <p class="text-muted mb-0" style="font-size: 0.9rem;">
                            Daftar pengunjung yang sudah memesan tiket atau paket objek wisata.
                        </p>
                    </div>

                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <div class="summary-chip">
                            <span class="summary-label">Total Transaksi</span>
                            <span class="summary-value">{{ $pemesanan->count() }} Pesanan</span>
                        </div>
                        <div class="summary-chip">
                            <span class="summary-label">Total Pendapatan</span>
                            <span class="summary-value" style="color: var(--warm-coral-dark);">
                                Rp {{ number_format($pemesanan->sum('jumlah_harga'), 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>

                <hr class="mb-4">

                @if ($pemesanan->isEmpty())
                    <div class="text-center py-5">
                        <h2 class="h5 fw-bold text-secondary mb-2">Belum ada pemesanan masuk</h2>
                        <p class="text-muted mb-0">
                            Data pemesan akan muncul di sini setelah pengunjung melakukan pemesanan objek wisata.
                        </p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-teal-head">
                                <tr>
                                    <th>No</th>
                                    <th>Pengguna (Pemesan)</th>
                                    <th>Objek Wisata</th>
                                    <th class="text-center">Jumlah</th>
                                    <th>Tanggal Tiket</th>
                                    <th class="text-end">Jumlah Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemesanan as $item)
                                    @php
                                        $namaPemesan =
                                            optional($item->pengguna)->nama_pengguna ?? 'User #' . $item->id_pengguna;
                                        $usernamePemesan = optional($item->pengguna)->username;
                                        $namaObjek = optional($item->objek)->nama_objek ?? 'Objek #' . $item->id_objek;
                                        $inisialPemesan = strtoupper(substr($namaPemesan, 0, 2));
                                    @endphp
                                    <tr>
                                        <td class="fw-semibold text-secondary">#{{ $item->id_pemesanan }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="buyer-avatar">{{ $inisialPemesan }}</span>
                                                <div>
                                                    <div class="fw-bold text-dark">{{ $namaPemesan }}</div>
                                                    <small class="text-muted">
                                                        {{ $usernamePemesan ? '@' . $usernamePemesan : 'ID Pengguna: ' . $item->id_pengguna }}
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-dark">{{ $namaObjek }}</div>
                                            <small class="text-muted">ID Objek: #{{ $item->id_objek }}</small>
                                        </td>
                                        <td class="text-center">
                                            <span class="qty-pill">{{ $item->jumlah }} Tiket</span>
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->tanggal_tiket)->translatedFormat('d M Y') }}
                                        </td>
                                        <td class="text-end price-total">
                                            Rp {{ number_format($item->jumlah_harga, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
