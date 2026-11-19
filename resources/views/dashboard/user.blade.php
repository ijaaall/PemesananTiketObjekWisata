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

        /* Banner Sambutan Ala Toko Wisata */
        .shop-banner {
            background: linear-gradient(125deg, #006666 0%, #008080 55%, #0d9488 100%);
            color: #ffffff;
            border-radius: 18px;
            padding: 24px 28px;
            box-shadow: 0 14px 30px rgba(0, 102, 102, 0.2);
            position: relative;
            overflow: hidden;
        }

        .shop-banner::after {
            content: "";
            position: absolute;
            right: -40px;
            bottom: -40px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255, 107, 107, 0.22);
            pointer-events: none;
        }

        .shop-banner p {
            color: rgba(255, 255, 255, 0.88);
            max-width: 720px;
        }

        .banner-tag {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.16);
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 999px;
            margin-bottom: 8px;
        }

        /* Bar Pencarian & Filter ala Shopee */
        .filter-bar {
            background-color: #ffffff;
            border: 1px solid rgba(0, 128, 128, 0.16);
            border-radius: 14px;
            padding: 14px 18px;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.04);
        }

        .search-input:focus {
            border-color: var(--ocean-teal-accent);
            box-shadow: 0 0 0 0.2rem rgba(0, 128, 128, 0.15);
        }

        /* Kartu Produk Wisata ala Shopee */
        .product-card {
            background-color: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.05);
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(0, 128, 128, 0.14);
            border-color: rgba(0, 128, 128, 0.35);
        }

        .product-img-box {
            position: relative;
            width: 100%;
            aspect-ratio: 4 / 3;
            background-color: #e6f4f1;
            overflow: hidden;
        }

        .product-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.25s ease;
        }

        .product-card:hover .product-img-box img {
            transform: scale(1.04);
        }

        .badge-tiket {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #ccfbf1;
            color: var(--ocean-teal-dark);
            font-size: 0.7rem;
            font-weight: 700;
            padding: 3px 9px;
            border-radius: 999px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .badge-stok {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: rgba(15, 23, 42, 0.76);
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 600;
            padding: 3px 9px;
            border-radius: 999px;
            backdrop-filter: blur(4px);
        }

        .badge-stok.habis {
            background-color: rgba(220, 38, 38, 0.9);
        }

        .product-body {
            padding: 14px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .product-title {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-desc {
            font-size: 0.82rem;
            color: var(--text-muted-slate);
            margin-bottom: 12px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 2.45rem;
        }

        .product-price-row {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 6px;
            margin-top: auto;
            margin-bottom: 12px;
        }

        .product-price {
            font-size: 1.08rem;
            font-weight: 800;
            color: var(--warm-coral-dark);
        }

        .product-unit {
            font-size: 0.75rem;
            color: var(--text-muted-slate);
            font-weight: 600;
        }

        .btn-pesan-shopee {
            background: linear-gradient(135deg, #FF6B6B 0%, #ff5252 100%);
            border: none;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.88rem;
            padding: 9px 12px;
            border-radius: 10px;
            text-decoration: none;
            display: block;
            text-align: center;
            box-shadow: 0 6px 14px rgba(255, 107, 107, 0.25);
            transition: filter 0.15s ease, transform 0.08s ease;
        }

        .btn-pesan-shopee:hover {
            filter: brightness(1.04);
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-pesan-shopee.disabled {
            background: #cbd5e1;
            box-shadow: none;
            pointer-events: none;
            color: #64748b;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom py-3 mb-4">
        <div class="container">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <a href="{{ url('/dashboard') }}" class="navbar-brand mb-0 h4 brand-title">MY APLIKASI KU</a>
                <span class="brand-badge">Tiket &amp; Wisata</span>
            </div>

            <div class="d-flex align-items-center gap-2 ms-auto my-2 my-lg-0">
                <span class="text-muted small d-none d-sm-inline">
                    Halo, <strong class="text-dark">{{ Auth::guard('pengguna')->user()->nama_pengguna }}</strong>
                </span>

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

        <section class="shop-banner mb-4">
            <span class="banner-tag">Marketplace Tiket Wisata</span>
            <h2 class="h4 fw-bold mb-2">
                Selamat Datang Di Pemesanan Tiket Objek Wisata {{ Auth::guard('pengguna')->user()->nama_pengguna }}
            </h2>
            <p class="mb-0 small">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex dolores corporis provident repudiandae amet
                dolorem
                esse minima consequatur laboriosam maiores!
            </p>
        </section>

        <section class="filter-bar mb-4">
            <div class="row g-2 align-items-center">
                <div class="col-md-7">
                    <input type="text" id="cariObjek" class="form-control search-input"
                        placeholder="Cari nama atau deskripsi objek wisata...">
                </div>
                <div class="col-md-3">
                    <select id="filterStok" class="form-select search-input">
                        <option value="all">Semua Tiket ({{ $objek->count() }})</option>
                        <option value="ready">Tersedia / Ada Stok</option>
                        <option value="soldout">Habis</option>
                    </select>
                </div>
                <div class="col-md-2 text-md-end">
                    <span class="badge rounded-pill px-3 py-2" style="background-color:#ccfbf1;color:#0f766e;"
                        id="jumlahTampil">
                        {{ $objek->count() }} Destinasi
                    </span>
                </div>
            </div>
        </section>

        @if ($objek->isEmpty())
            <div class="text-center bg-white p-5 rounded-4 border shadow-sm">
                <h3 class="h5 fw-bold text-secondary mb-2">Belum ada tiket objek wisata tersedia</h3>
                <p class="text-muted mb-0">Silakan cek kembali beberapa saat lagi untuk melihat destinasi baru.</p>
            </div>
        @else
            <div class="row g-3 g-md-4" id="katalogWisata">
                @foreach ($objek as $item)
                    <div class="col-6 col-md-4 col-lg-3 item-katalog"
                        data-nama="{{ strtolower($item->nama_objek . ' ' . $item->deskripsi) }}"
                        data-stok="{{ $item->stok > 0 ? 'ready' : 'soldout' }}">
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="badge-tiket">Tiket #{{ $item->id_objek }}</span>
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="gambar objek">
                                <span class="badge-stok {{ $item->stok <= 0 ? 'habis' : '' }}">
                                    {{ $item->stok > 0 ? 'Sisa ' . $item->stok : 'Habis' }}
                                </span>
                            </div>

                            <div class="product-body">
                                <h3 class="product-title" title="{{ $item->nama_objek }}">
                                    {{ $item->nama_objek }}
                                </h3>

                                <p class="product-desc" title="{{ $item->deskripsi }}">
                                    {{ $item->deskripsi }}
                                </p>

                                <div class="product-price-row">
                                    <span class="product-price">
                                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                                    </span>
                                    <span class="product-unit">/ tiket</span>
                                </div>

                                <a href="{{ route('pemesanan.create', $item->id_objek) }}"
                                    class="btn-pesan-shopee {{ $item->stok <= 0 ? 'disabled' : '' }}">
                                    {{ $item->stok > 0 ? 'Pesan Sekarang' : 'Stok Habis' }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="kosongFilter" class="text-center bg-white p-5 rounded-4 border shadow-sm mt-4 d-none">
                <h3 class="h6 fw-bold text-secondary mb-1">Destinasi tidak ditemukan</h3>
                <p class="text-muted small mb-0">Coba kata kunci lain atau ubah filter tiket.</p>
            </div>
        @endif
    </main>

    <script>
        const inputCari = document.getElementById('cariObjek');
        const selectStok = document.getElementById('filterStok');
        const items = document.querySelectorAll('.item-katalog');
        const labelJumlah = document.getElementById('jumlahTampil');
        const kosongFilter = document.getElementById('kosongFilter');

        function saringKatalog() {
            const kata = (inputCari ? inputCari.value : '').toLowerCase().trim();
            const statusStok = selectStok ? selectStok.value : 'all';
            let terlihat = 0;

            items.forEach((el) => {
                const teks = el.getAttribute('data-nama') || '';
                const stok = el.getAttribute('data-stok') || 'ready';

                const cocokKata = teks.includes(kata);
                const cocokStok = statusStok === 'all' || stok === statusStok;

                if (cocokKata && cocokStok) {
                    el.classList.remove('d-none');
                    terlihat++;
                } else {
                    el.classList.add('d-none');
                }
            });

            if (labelJumlah) {
                labelJumlah.textContent = terlihat + ' Destinasi';
            }

            if (kosongFilter) {
                kosongFilter.classList.toggle('d-none', terlihat > 0);
            }
        }

        if (inputCari) inputCari.addEventListener('input', saringKatalog);
        if (selectStok) selectStok.addEventListener('change', saringKatalog);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
