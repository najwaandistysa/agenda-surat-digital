<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Agenda Surat Digital</title>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="position-relative">

    <!-- Ambient Glow Background -->
    <div class="glow-bg"></div>

    <!-- Header / Navbar Glassmorphism -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-glass sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('landing') }}">
                <span class="icon-box p-2" style="width: 38px; height: 38px; font-size: 1.1rem;">
                    <i class="bi bi-folder2-open"></i>
                </span>
                <span class="fs-5">AgendaSurat<span class="text-gradient-purple">.Digital</span></span>
            </a>

            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Link Navigasi -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link hover-purple px-2" href="{{ route('surat.masuk') }}">
                            <i class="bi bi-arrow-down-left-circle me-1"></i> Surat Masuk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-purple px-2" href="{{ route('surat.keluar') }}">
                            <i class="bi bi-arrow-up-right-circle me-1"></i> Surat Keluar
                        </a>
                    </li>
                    {{-- Link ini hanya muncul untuk role Admin --}}
                    @if(auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link hover-purple px-2" href="{{ route('log.index') }}">
                            <i class="bi bi-clock-history me-1"></i> Log Aktivitas
                        </a>
                    </li>
                    @endif
                </ul>

                <div class="d-flex align-items-center gap-3">
                    <div class="d-none d-md-flex align-items-center gap-2 px-3 py-2 rounded-pill me-2" style="background: rgba(168, 85, 247, 0.12); border: 1px solid rgba(168, 85, 247, 0.3);">
                        <i class="bi bi-person-circle text-purple"></i>
                        <span class="small fw-semibold text-white">{{ auth()->user()->name }}</span>
                        <span class="badge rounded-pill px-2 py-1" style="background: {{ auth()->user()->role === 'admin' ? 'rgba(168, 85, 247, 0.3)' : 'rgba(148, 163, 184, 0.25)' }}; color: {{ auth()->user()->role === 'admin' ? '#e9d5ff' : '#cbd5e1' }}; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.5px;">
                            {{ auth()->user()->role === 'admin' ? 'Admin' : 'Guest' }}
                        </span>
                    </div>
                    <a href="{{ route('landing') }}" class="btn btn-outline-light btn-sm me-2 rounded-pill px-3">
                        <i class="bi bi-house me-1"></i> Beranda
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-neon-outline-purple btn-sm rounded-pill px-3">
                            <i class="bi bi-box-arrow-right me-1"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-5 position-relative z-1">

        <!-- Flash Alert Success -->
        @if(session('success'))
            <div class="alert alert-dismissible fade show mb-4 text-white d-flex align-items-center gap-2" role="alert" style="background: rgba(34, 197, 94, 0.2); border: 1px solid rgba(34, 197, 94, 0.5); backdrop-filter: blur(10px); border-radius: 14px;">
                <i class="bi bi-check-circle-fill text-success fs-5"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Title & Header Bar -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h1 class="fw-extrabold h2 mb-1 text-white">Daftar Agenda Surat</h1>
                <p class="text-subtle-light mb-0">Kelola dan pantau seluruh data arsip surat masuk dan keluar secara real-time</p>
            </div>
            @if(auth()->user()->role === 'admin')
            <div>
                <a href="{{ route('surat.create') }}" class="btn btn-neon-purple px-4 py-2.5 rounded-3 d-inline-flex align-items-center gap-2">
                    <i class="bi bi-plus-circle-fill fs-6"></i>
                    <span>Tambah Surat Baru</span>
                </a>
            </div>
            @endif
        </div>

        <!-- Cards Statistics -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card card-stat h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box-lg" style="background: rgba(168, 85, 247, 0.2); color: #c084fc; border: 1px solid rgba(168, 85, 247, 0.4);">
                            <i class="bi bi-files"></i>
                        </div>
                        <div>
                            <span class="text-subtle-light small text-uppercase fw-bold" style="letter-spacing: 1px; font-size: 0.8rem;">Total Surat</span>
                            <h1 class="fw-extrabold text-white mb-0 mt-1" style="font-size: 2.2rem; line-height: 1;">{{ $surats->count() }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stat h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box-lg" style="background: rgba(34, 197, 94, 0.2); color: #4ade80; border: 1px solid rgba(34, 197, 94, 0.4);">
                            <i class="bi bi-arrow-down-left-circle"></i>
                        </div>
                        <div>
                            <span class="text-subtle-light small text-uppercase fw-bold" style="letter-spacing: 1px; font-size: 0.8rem;">Surat Masuk</span>
                            <h1 class="fw-extrabold text-white mb-0 mt-1" style="font-size: 2.2rem; line-height: 1;">
                                {{ $totalMasuk ?? $surats->filter(fn($i) => strtolower(trim($i->jenis_surat)) === 'masuk')->count() }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stat h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box-lg" style="background: rgba(239, 68, 68, 0.2); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.4);">
                            <i class="bi bi-arrow-up-right-circle"></i>
                        </div>
                        <div>
                            <span class="text-subtle-light small text-uppercase fw-bold" style="letter-spacing: 1px; font-size: 0.8rem;">Surat Keluar</span>
                            <h1 class="fw-extrabold text-white mb-0 mt-1" style="font-size: 2.2rem; line-height: 1;">
                                {{ $totalKeluar ?? $surats->filter(fn($i) => strtolower(trim($i->jenis_surat)) === 'keluar')->count() }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Agenda Surat -->
        <div class="table-custom-container mb-4">
            <div class="table-responsive">
                <table class="table table-custom align-middle">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 60px;">No</th>
                            <th>Nomor Surat</th>
                            <th class="text-center" style="width: 130px;">Jenis</th>
                            <th>Pengirim / Penerima</th>
                            <th>Perihal</th>
                            <th style="width: 140px;">Tanggal</th>
                            <th class="text-center" style="width: 110px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($surats as $index => $item)
                            <tr>
                                <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                                <td class="fw-bold text-white text-nowrap" style="font-family: monospace; font-size: 0.95rem;">
                                    <i class="bi bi-file-earmark-text me-1 text-purple"></i> {{ $item->nomor_surat }}
                                </td>
                                <td class="text-center">
                                    @if(strtolower(trim($item->jenis_surat)) == 'masuk')
                                        <span class="badge-masuk"><i class="bi bi-arrow-down-left me-1"></i> Masuk</span>
                                    @else
                                        <span class="badge-keluar"><i class="bi bi-arrow-up-right me-1"></i> Keluar</span>
                                    @endif
                                </td>
                                <td class="text-subtle-light fw-medium">
                                    {{ $item->pengirim_penerima }}
                                </td>
                                <td class="text-subtle-light">
                                    {{ $item->perihal }}
                                </td>
                                <td class="text-subtle-light small text-nowrap">
                                    <i class="bi bi-calendar3 me-1 text-purple"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal_surat)->translatedFormat('d M Y') }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('surat.cetak', $item->id) }}" class="btn-action-edit" title="Cetak Surat" target="_blank">
                                            <i class="bi bi-printer-fill"></i>
                                        </a>

                                        <a href="{{ route('surat.edit', $item->id) }}" class="btn-action-edit" title="Edit Surat">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Tombol Pemicu Modal Delete -->
                                        <button type="button" class="btn-action-delete" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}" title="Hapus Surat">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                        @else
                                        <span class="text-subtle-light small">-</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2 text-purple opacity-50"></i>
                                    <span>Belum ada data agenda surat yang tersimpan.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- Modal Delete -->
    @if(auth()->user()->role === 'admin')
    @foreach($surats as $item)
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-cyber text-start p-2">
                    <div class="modal-body text-center p-4">
                        <div class="icon-box mx-auto mb-3" style="width: 60px; height: 60px; font-size: 1.8rem; background: rgba(239, 68, 68, 0.2); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.4); border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <h4 class="fw-bold text-white mb-2">Konfirmasi Hapus Surat</h4>
                        <p class="text-subtle-light small mb-4">
                            Apakah Anda yakin ingin menghapus data surat <strong class="text-white">{{ $item->nomor_surat }}</strong>? Tindakan ini tidak dapat dibatalkan.
                        </p>

                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-outline-light rounded-pill px-4 py-2 small" data-bs-dismiss="modal">
                                Batal
                            </button>
                            
                            <form action="{{ route('surat.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-pill px-4 py-2 small fw-semibold shadow" style="background: #ef4444; border: none;">
                                    <i class="bi bi-trash3-fill me-1"></i> Ya, Hapus Data
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif

    <!-- Footer -->
    <footer class="mt-auto py-4 text-center border-top border-purple position-relative z-1" style="border-color: rgba(168, 85, 247, 0.2) !important;">
        <div class="container">
            <p class="small text-subtle-light mb-0">&copy; {{ date('Y') }} <strong>AgendaSurat.Digital</strong> — Dashboard Administrasi.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>