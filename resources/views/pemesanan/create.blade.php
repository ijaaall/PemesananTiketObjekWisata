<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemesanan Tiket Objek Wisata</title>
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
            padding-bottom: 56px;
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

        .checkout-card {
            background-color: #ffffff;
            border: 1px solid rgba(0, 128, 128, 0.18);
            border-top: 4px solid var(--ocean-teal-accent);
            border-radius: 16px;
            box-shadow: 0 16px 35px -12px rgba(15, 23, 42, 0.12);
        }

        .page-heading {
            color: var(--ocean-teal-dark);
            font-weight: 700;
        }

        .destinasi-preview {
            background-color: #f0fdfa;
            border: 1px solid rgba(0, 128, 128, 0.2);
            border-radius: 14px;
            padding: 14px;
        }

        .destinasi-thumb {
            width: 96px;
            height: 96px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid rgba(0, 128, 128, 0.2);
            flex-shrink: 0;
        }

        .readonly-field {
            background-color: #f8fafc !important;
            color: #334155;
            font-weight: 600;
        }

        .form-control:focus {
            border-color: var(--ocean-teal-accent);
            box-shadow: 0 0 0 0.2rem rgba(0, 128, 128, 0.16);
        }

        /* Stepper jumlah tiket ala Shopee */
        .qty-stepper {
            display: inline-flex;
            align-items: center;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            overflow: hidden;
            background-color: #ffffff;
        }

        .qty-step-btn {
            width: 38px;
            height: 38px;
            border: none;
            background-color: #f0fdfa;
            color: var(--ocean-teal-dark);
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.15s ease;
        }

        .qty-step-btn:hover {
            background-color: #ccfbf1;
        }

        #jumlah.qty-field {
            width: 64px;
            border: none;
            border-left: 1px solid #e2e8f0;
            border-right: 1px solid #e2e8f0;
            border-radius: 0;
            text-align: center;
            font-weight: 800;
            color: #0f172a;
            background-color: #ffffff !important;
            box-shadow: none;
        }

        .total-box {
            background-color: #fff5f5;
            border: 1px solid rgba(255, 107, 107, 0.35);
            border-radius: 14px;
            padding: 14px 16px;
        }

        #jumlah_harga.total-input {
            background-color: transparent !important;
            border: none;
            padding: 0;
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--warm-coral-dark);
            text-align: right;
            box-shadow: none;
        }

        .btn-pesan-submit {
            background: linear-gradient(135deg, #FF6B6B 0%, #ff5252 100%);
            border: none;
            color: #ffffff;
            font-weight: 700;
            font-size: 1rem;
            padding: 12px 18px;
            border-radius: 12px;
            box-shadow: 0 8px 18px rgba(255, 107, 107, 0.28);
            transition: filter 0.15s ease, transform 0.08s ease;
        }

        .btn-pesan-submit:hover {
            filter: brightness(1.04);
            color: #ffffff;
            transform: translateY(-1px);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom py-3 mb-4">
        <div class="container">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <a href="{{ url('/dashboard') }}" class="navbar-brand mb-0 h4 brand-title">MY APLIKASI KU</a>
                <span class="brand-badge">Checkout Tiket</span>
            </div>

            <div class="d-flex align-items-center gap-2 ms-auto my-2 my-lg-0">
                <a href="{{ route('/dashboard') }}" class="btn btn-outline-secondary btn-sm px-3">
                    ← Kembali ke Katalog
                </a>

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
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card checkout-card">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
                            <span class="badge rounded-pill px-3 py-2"
                                style="background-color:#ccfbf1;color:#0f766e;">Ringkasan Pesanan Tiket</span>
                            <span class="small text-muted">ID Objek #{{ $objek->id_objek }}</span>
                        </div>

                        <h1 class="h4 page-heading mt-2 mb-3">Pemesanan Tiket Objek Wisata</h1>
                        <hr class="mb-4">

                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3 mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('pemesanan.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_objek" value="{{ $objek->id_objek }}">
                            <input type="hidden" name="id_pengguna" value="{{ auth('pengguna')->id() }}">

                            {{-- Preview Destinasi ala Item Keranjang Shopee --}}
                            <div class="destinasi-preview d-flex align-items-center gap-3 mb-4">
                                @if ($objek->gambar)
                                    <img class="destinasi-thumb" src="{{ asset('storage/' . $objek->gambar) }}"
                                        alt="{{ $objek->gambar }}">
                                @endif
                                <div class="min-w-0 flex-grow-1">
                                    <div class="small text-muted fw-semibold">Destinasi Terpilih</div>
                                    <div class="fs-5 fw-bold text-dark text-truncate">{{ $objek->nama_objek }}</div>
                                    <div class="small" style="color: var(--ocean-teal-dark); font-weight: 600;">
                                        Stok tersedia: {{ $objek->stok }} tiket
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="nama_objek" class="form-label fw-semibold">Nama Objek</label>
                                    <input type="text" class="form-control readonly-field" name="nama_objek"
                                        id="nama_objek" value="{{ $objek->nama_objek }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label for="pengguna" class="form-label fw-semibold">Pemesan</label>
                                    <input type="text" class="form-control readonly-field" name="pengguna"
                                        id="pengguna"
                                        value="{{ session('nama_pengguna') ?? auth('pengguna')->user()->nama_pengguna }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="harga_tiket" class="form-label fw-semibold">Harga Tiket</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light fw-bold text-secondary">Rp</span>
                                        {{-- Gunakan data-harga untuk menyimpan angka asli tanpa titik agar mudah dihitung JS --}}
                                        <input type="text" class="form-control readonly-field" name="harga_tiket"
                                            id="harga_tiket" data-harga="{{ $objek->harga }}"
                                            value="{{ number_format($objek->harga, 0, ',', '.') }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="tanggal_tiket" class="form-label fw-semibold">Tanggal Kunjungan</label>
                                    <input type="date" class="form-control" name="tanggal_tiket" id="tanggal_tiket"
                                        value="{{ old('tanggal_tiket') }}" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="jumlah" class="form-label fw-semibold d-block">
                                    Jumlah Tiket (stok tersedia : {{ $objek->stok }})
                                </label>
                                <div class="d-flex align-items-center gap-3 flex-wrap">
                                    <div class="qty-stepper">
                                        {{-- Tambahkan type="button" agar tidak men-submit form saat diklik --}}
                                        <button type="button" class="qty-step-btn" id="kurang">-</button>
                                        <input type="number" class="form-control qty-field" name="jumlah"
                                            id="jumlah" min="1" max="{{ $objek->stok }}"
                                            value="{{ old('jumlah', 1) }}" readonly required>
                                        <button type="button" class="qty-step-btn" id="tambah">+</button>
                                    </div>
                                    <span class="small text-muted">
                                        Maksimal {{ $objek->stok }} tiket per transaksi
                                    </span>
                                </div>
                            </div>

                            <div
                                class="total-box d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4">
                                <div>
                                    <label for="jumlah_harga" class="form-label fw-bold mb-0"
                                        style="color: var(--ocean-teal-dark);">Total Harga</label>
                                    <div class="small text-muted">Sudah dihitung otomatis sesuai jumlah tiket</div>
                                </div>

                                <div class="d-flex align-items-center justify-content-sm-end gap-1">
                                    <span class="fw-bold"
                                        style="color: var(--warm-coral-dark); font-size: 1.15rem;">Rp</span>
                                    <input type="text" class="form-control total-input" name="jumlah_harga"
                                        id="jumlah_harga" value="{{ $objek->harga }}" readonly>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-pesan-submit w-100">Pesan Tiket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        const tambah = document.getElementById('tambah');
        const kurang = document.getElementById('kurang');
        const inputJumlah = document.getElementById('jumlah');
        const hargaTiket = parseFloat(document.getElementById('harga_tiket').dataset.harga);
        const totalHarga = document.getElementById('jumlah_harga');

        const min = parseInt(inputJumlah.min);
        const max = parseInt(inputJumlah.max);

        function hitungTotal() {
            const jumlah = parseInt(inputJumlah.value) || 1;
            const hasil = hargaTiket * jumlah;
            totalHarga.value = hasil.toLocaleString('id-ID');
        }

        tambah.addEventListener('click', function() {
            let jumlahSekarang = parseInt(inputJumlah.value);
            if (jumlahSekarang < max) {
                inputJumlah.value = jumlahSekarang + 1;
                hitungTotal();
            }
        });

        kurang.addEventListener('click', function() {
            let jumlahSekarang = parseInt(inputJumlah.value);
            if (jumlahSekarang > min) {
                inputJumlah.value = jumlahSekarang - 1;
                hitungTotal();
            }
        });

        hitungTotal();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
