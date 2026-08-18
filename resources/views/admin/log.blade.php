<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas - Agenda Surat Digital</title>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="position-relative">

    <div class="glow-bg"></div>

    <!-- Navbar -->
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
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link hover-purple px-2" href="{{ route('surat.index') }}">
                            <i class="bi bi-grid me-1"></i> Dashboard
                        </a>
                    </li>
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
                        <a class="nav-link hover-purple px-2 fw-bold text-white" href="{{ route('log.index') }}">
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

        <div class="mb-4">
            <h1 class="fw-extrabold h2 mb-1 text-white">
                <i class="bi bi-clock-history text-purple me-2"></i> Log Aktivitas
            </h1>
            <p class="text-subtle-light mb-0">Riwayat seluruh aksi Tambah, Ubah, dan Hapus data surat oleh Admin</p>
        </div>

        <div class="table-custom-container mb-4">
            <div class="table-responsive">
                <table class="table table-custom align-middle">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 60px;">No</th>
                            <th>Nama User</th>
                            <th>Aktivitas</th>
                            <th style="width: 220px;">Waktu Kejadian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $index => $log)
                            <tr>
                                <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                                <td class="fw-bold text-white">
                                    <i class="bi bi-person-circle me-1 text-purple"></i> {{ $log->username }}
                                </td>
                                <td class="text-subtle-light">{{ $log->aktivitas }}</td>
                                <td class="text-subtle-light small">
                                    <i class="bi bi-calendar3 me-1 text-purple"></i>
                                    {{ $log->created_at->translatedFormat('d M Y, H:i') }} WIB
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2 text-purple opacity-50"></i>
                                    <span>Belum ada aktivitas yang tercatat.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <footer class="mt-auto py-4 text-center border-top border-purple position-relative z-1" style="border-color: rgba(168, 85, 247, 0.2) !important;">
        <div class="container">
            <p class="small text-subtle-light mb-0">&copy; {{ date('Y') }} <strong>AgendaSurat.Digital</strong> — Dashboard Administrasi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
