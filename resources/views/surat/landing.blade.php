<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Agenda Surat Digital</title>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Style tambahan khusus untuk mempercantik judul Hero -->
    <style>
        .hero-title {
            font-size: clamp(2.4rem, 6vw, 4.2rem);
            font-weight: 800;
            letter-spacing: -0.02em;
            line-height: 1.15;
            position: relative;
            display: inline-block;
            padding: 0 0.2em;
            background: linear-gradient(
                100deg,
                #f0abfc 0%,
                #c084fc 25%,
                #a855f7 45%,
                #e9d5ff 60%,
                #c084fc 80%,
                #f0abfc 100%
            );
            background-size: 220% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: heroShine 6s ease-in-out infinite;
            filter: drop-shadow(0 0 28px rgba(168, 85, 247, 0.45));
        }

        .hero-title::after {
            content: "";
            position: absolute;
            left: 5%;
            right: 5%;
            bottom: -0.15em;
            height: 0.5em;
            background: radial-gradient(ellipse at center, rgba(168, 85, 247, 0.35) 0%, rgba(168, 85, 247, 0) 70%);
            filter: blur(10px);
            z-index: -1;
            pointer-events: none;
        }

        @keyframes heroShine {
            0%   { background-position: 0% center; }
            50%  { background-position: 100% center; }
            100% { background-position: 0% center; }
        }

        @media (prefers-reduced-motion: reduce) {
            .hero-title { animation: none; }
        }
    </style>
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
                <ul class="navbar-nav ms-auto me-3 my-2 my-lg-0 gap-lg-2">
                    <li class="nav-item"><a class="nav-link hover-purple px-2" href="#keunggulan">Keunggulan</a></li>
                    <li class="nav-item"><a class="nav-link hover-purple px-2" href="#fitur">Fitur Lengkap</a></li>
                    <li class="nav-item"><a class="nav-link hover-purple px-2" href="#alur">Alur Kerja</a></li>
                    <li class="nav-item"><a class="nav-link hover-purple px-2" href="#keamanan">Keamanan</a></li>
                    <li class="nav-item"><a class="nav-link hover-purple px-2" href="#faq">FAQ</a></li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    {{-- Menggunakan @auth & @guest Bawaan Laravel Breeze --}}
                    @auth
                        <a href="{{ route('surat.index') }}" class="btn btn-neon-purple px-4 py-2">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    @else
    <a href="{{ route('register') }}" class="btn btn-neon-outline-purple px-4 py-2 me-2">
        <i class="bi bi-person-plus me-1"></i> Register
    </a>
    <a href="{{ route('login') }}" class="btn btn-neon-purple px-4 py-2">
        <i class="bi bi-box-arrow-in-right me-1"></i> Login
    </a>
@endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-5 my-md-4 position-relative z-1 overflow-hidden">
        <!-- Floating Orbs Dekoratif -->
        <span class="floating-orb orb-1"></span>
        <span class="floating-orb orb-2"></span>
        <span class="floating-orb orb-3"></span>
        <span class="floating-orb orb-4"></span>
        <span class="floating-orb orb-5"></span>

        <div class="container text-center py-5 position-relative" style="z-index: 1;">
            <span class="badge border px-3 py-2 rounded-pill mb-3 text-uppercase fw-semibold badge-pulse reveal" style="letter-spacing: 1px; font-size: 0.75rem; background: rgba(168, 85, 247, 0.15); border-color: rgba(168, 85, 247, 0.4) !important; color: #e9d5ff !important;">
                <i class="bi bi-shield-check me-1 text-purple"></i> SISTEM MANAJEMEN PENGARSIPAN RESMI
            </span>
            <h1 class="mb-3 reveal reveal-delay-1">
                <span class="hero-title">Sistem Agenda Surat Digital Modern</span>
            </h1>
            <p class="lead max-w-2xl mx-auto mb-4 reveal reveal-delay-2" style="max-width: 720px; color: #d8b4fe !important;">
                Kelola pencatatan agenda surat masuk dan keluar secara digital, cepat, aman, dan terintegrasi dengan tampilan antarmuka mutakhir.
            </p>
            <div class="d-flex justify-content-center gap-3 reveal reveal-delay-3">
                @auth
                    <a href="{{ route('surat.index') }}" class="btn btn-neon-purple btn-lg px-4 fs-6">
                        <i class="bi bi-folder-symlink me-2"></i> Kelola Agenda Surat
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-neon-purple btn-lg px-4 fs-6">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Masuk Sekarang
                    </a>
                @endauth
                <a href="#fitur" class="btn btn-neon-outline-purple btn-lg px-4 fs-6">
                    <i class="bi bi-eye me-2"></i> Lihat Fitur
                </a>
            </div>
        </div>
    </section>

    <!-- Statistik Section -->
    <section class="py-4 position-relative z-1 border-top border-bottom" style="border-color: rgba(168, 85, 247, 0.2) !important; background: rgba(15, 8, 30, 0.6);">
        <div class="container text-center">
            <div class="row g-4">
                <div class="col-6 col-md-3 reveal reveal-delay-1">
                    <h2 class="fw-bold text-gradient-purple mb-0"><span class="counter-value" data-count-to="100" data-suffix="%">0%</span></h2>
                    <p class="small mb-0 text-muted">Digitalisasi Arsip</p>
                </div>
                <div class="col-6 col-md-3 reveal reveal-delay-2">
                    <h2 class="fw-bold text-gradient-purple mb-0"><span class="counter-value" data-count-to="24" data-suffix="/7">0/7</span></h2>
                    <p class="small mb-0 text-muted">Akses Real-time</p>
                </div>
                <div class="col-6 col-md-3 reveal reveal-delay-3">
                    <h2 class="fw-bold text-gradient-purple mb-0"><span class="counter-value" data-count-from="42" data-count-to="0" data-suffix="%">42%</span></h2>
                    <p class="small mb-0 text-muted">Risiko Berkas Hilang</p>
                </div>
                <div class="col-6 col-md-3 reveal reveal-delay-4">
                    <h2 class="fw-bold text-gradient-purple mb-0"><span class="counter-value">SSL</span></h2>
                    <p class="small mb-0 text-muted">Akses Terenkripsi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Keunggulan Ringkas Section -->
    <section id="keunggulan" class="py-5 position-relative z-1">
        <div class="container py-4">
            <div class="text-center mb-5 reveal">
                <h2 class="fw-bold h3 mb-2">Keunggulan Sistem Digital</h2>
                <p class="small text-muted">Layanan terbaik untuk efisiensi tata kelola administrasi surat</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 reveal reveal-delay-1">
                    <div class="card card-tech h-100 p-4 text-center">
                        <div class="icon-box icon-float mx-auto mb-3">
                            <i class="bi bi-inboxes-fill"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Pencatatan Terstruktur</h5>
                        <p class="small mb-0 text-muted">Semua riwayat surat masuk dan keluar tersimpan otomatis dan terurut berdasarkan tanggal.</p>
                    </div>
                </div>
                <div class="col-md-4 reveal reveal-delay-2">
                    <div class="card card-tech h-100 p-4 text-center">
                        <div class="icon-box icon-float mx-auto mb-3" style="animation-delay: 0.4s;">
                            <i class="bi bi-shield-lock-fill"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Akses Terproteksi</h5>
                        <p class="small mb-0 text-muted">Keamanan data terjamin dengan otentikasi login admin yang terenkripsi dan aman.</p>
                    </div>
                </div>
                <div class="col-md-4 reveal reveal-delay-3">
                    <div class="card card-tech h-100 p-4 text-center">
                        <div class="icon-box icon-float mx-auto mb-3" style="animation-delay: 0.8s;">
                            <i class="bi bi-cpu-fill"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Akses Cepat & Responsif</h5>
                        <p class="small mb-0 text-muted">Antarmuka berbasis Cyber Neon yang ringan, nyaman di mata, dan responsif di semua perangkat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Lengkap Section -->
    <section id="fitur" class="py-5 position-relative z-1">
        <div class="container py-4">
            <div class="text-center mb-5 reveal">
                <span class="badge border px-3 py-1.5 rounded-pill mb-2 text-uppercase" style="background: rgba(168, 85, 247, 0.1); border-color: rgba(168, 85, 247, 0.3) !important; color: #c084fc !important; font-size: 0.7rem;">FITUR UTAMA</span>
                <h2 class="fw-bold h3 mb-2">Layanan Lengkap Pengelolaan Dokumen</h2>
                <p class="small text-muted">Didesain lengkap untuk memenuhi standar administrasi perkantoran modern</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 reveal reveal-delay-1">
                    <div class="card card-tech h-100 p-4">
                        <div class="icon-box icon-float mb-3">
                            <i class="bi bi-box-arrow-in-down"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Registrasi Surat Masuk</h5>
                        <p class="small mb-0 text-muted">Merekam riwayat seluruh surat resmi yang diterima instansi lengkap dengan asal pengirim, nomor, dan perihal.</p>
                    </div>
                </div>
                <div class="col-md-4 reveal reveal-delay-2">
                    <div class="card card-tech h-100 p-4">
                        <div class="icon-box icon-float mb-3" style="animation-delay: 0.3s;">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Registrasi Surat Keluar</h5>
                        <p class="small mb-0 text-muted">Pendataan nomor registrasi resmi untuk surat keluar guna menghindari nomor ganda atau penomoran bentrok.</p>
                    </div>
                </div>
                <div class="col-md-4 reveal reveal-delay-3">
                    <div class="card card-tech h-100 p-4">
                        <div class="icon-box icon-float mb-3" style="animation-delay: 0.6s;">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Manajemen Full CRUD</h5>
                        <p class="small mb-0 text-muted">Fleksibilitas penuh untuk menambah, mengedit rincian, serta menghapus entri agenda surat secara teratur.</p>
                    </div>
                </div>
                <div class="col-md-4 reveal reveal-delay-1">
                    <div class="card card-tech h-100 p-4">
                        <div class="icon-box icon-float mb-3" style="animation-delay: 0.2s;">
                            <i class="bi bi-search"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Pencarian & Filtering</h5>
                        <p class="small mb-0 text-muted">Proses pencarian berkas presisi tinggi berdasarkan jenis surat maupun nomor agenda dalam sekejap.</p>
                    </div>
                </div>
                <div class="col-md-4 reveal reveal-delay-2">
                    <div class="card card-tech h-100 p-4">
                        <div class="icon-box icon-float mb-3" style="animation-delay: 0.5s;">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Hak Akses Terproteksi</h5>
                        <p class="small mb-0 text-muted">Pengamanan halaman admin dengan otentikasi login akun khusus untuk menjaga kerahasiaan data.</p>
                    </div>
                </div>
                <div class="col-md-4 reveal reveal-delay-3">
                    <div class="card card-tech h-100 p-4">
                        <div class="icon-box icon-float mb-3" style="animation-delay: 0.7s;">
                            <i class="bi bi-device-ssd"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Arsip Digital Terpusat</h5>
                        <p class="small mb-0 text-muted">Seluruh riwayat persuratan tersimpan rapi dalam database terstruktur tanpa risiko penumpukan berkas fisik.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alur Kerja Section -->
    <section id="alur" class="py-5 position-relative z-1" style="background: rgba(15, 8, 30, 0.4);">
        <div class="container py-4">
            <div class="text-center mb-5 reveal">
                <h2 class="fw-bold h3 mb-2">Prosedur & Alur Kerja</h2>
                <p class="small text-muted">4 langkah mudah tata kelola agenda surat digital</p>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-3 reveal reveal-delay-1">
                    <div class="card card-tech p-4 h-100">
                        <div class="icon-box icon-float mx-auto mb-3" style="width: 50px; height: 50px; font-size: 1.2rem; background: linear-gradient(135deg, #7c3aed, #a855f7); color: #fff !important;">1</div>
                        <h6 class="fw-bold mb-2">Login Petugas</h6>
                        <p class="small mb-0 text-muted">Masuk ke dalam portal administrator menggunakan kredensial yang sah.</p>
                    </div>
                </div>
                <div class="col-md-3 reveal reveal-delay-2">
                    <div class="card card-tech p-4 h-100">
                        <div class="icon-box icon-float mx-auto mb-3" style="width: 50px; height: 50px; font-size: 1.2rem; background: linear-gradient(135deg, #7c3aed, #a855f7); color: #fff !important; animation-delay: 0.3s;">2</div>
                        <h6 class="fw-bold mb-2">Input Agenda</h6>
                        <p class="small mb-0 text-muted">Mengisi form nomor surat, tanggal, jenis, pengirim/penerima, dan perihal.</p>
                    </div>
                </div>
                <div class="col-md-3 reveal reveal-delay-3">
                    <div class="card card-tech p-4 h-100">
                        <div class="icon-box icon-float mx-auto mb-3" style="width: 50px; height: 50px; font-size: 1.2rem; background: linear-gradient(135deg, #7c3aed, #a855f7); color: #fff !important; animation-delay: 0.6s;">3</div>
                        <h6 class="fw-bold mb-2">Simpan Otomatis</h6>
                        <p class="small mb-0 text-muted">Sistem menyimpan data secara terstruktur ke dalam basis data Eloquent.</p>
                    </div>
                </div>
                <div class="col-md-3 reveal reveal-delay-4">
                    <div class="card card-tech p-4 h-100">
                        <div class="icon-box icon-float mx-auto mb-3" style="width: 50px; height: 50px; font-size: 1.2rem; background: linear-gradient(135deg, #7c3aed, #a855f7); color: #fff !important; animation-delay: 0.9s;">4</div>
                        <h6 class="fw-bold mb-2">Monitoring & Rekap</h6>
                        <p class="small mb-0 text-muted">Data agenda surat siap diperbarui, dicari, atau dipertanggungjawabkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Keamanan Section -->
    <section id="keamanan" class="py-5 position-relative z-1">
        <div class="container py-4">
            <div class="card card-login p-4 p-md-5 reveal">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <span class="badge border px-3 py-1.5 rounded-pill mb-2 text-uppercase" style="background: rgba(168, 85, 247, 0.15); border-color: rgba(168, 85, 247, 0.4) !important; color: #c084fc !important; font-size: 0.7rem;">TERJAMIN & AMAN</span>
                        <h3 class="fw-bold mb-3">Proteksi Akses Berlapis</h3>
                        <p class="small text-muted mb-4">
                            Aplikasi dikembangkan menggunakan standar keamanan tinggi Laravel Framework. Seluruh sesi login administrator diproteksi untuk menjamin kerahasiaan dokumen resmi instansi.
                        </p>
                        <div class="row g-3">
                            <div class="col-sm-6 d-flex align-items-start gap-2">
                                <i class="bi bi-check-circle-fill text-gradient-purple fs-5"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">Sesi Terenkripsi</h6>
                                    <p class="small text-muted mb-0">Melindungi akses ilegal dari pihak ketiga.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-start gap-2">
                                <i class="bi bi-check-circle-fill text-gradient-purple fs-5"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">Validasi Form Strict</h6>
                                    <p class="small text-muted mb-0">Mencegah kesalahan input atau serangan SQL Injection.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 text-center">
                        <div class="icon-box icon-float p-4 mx-auto" style="width: 100px; height: 100px; font-size: 3rem;">
                            <i class="bi bi-shield-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-5 position-relative z-1">
        <div class="container py-4">
            <div class="text-center mb-5 reveal">
                <h2 class="fw-bold h3 mb-2">Pertanyaan Sering Diajukan (FAQ)</h2>
                <p class="small text-muted">Informasi seputar penggunaan platform Agenda Surat Digital</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion accordion-flush" id="faqAccordion">
                        <div class="accordion-item card-tech mb-3 overflow-hidden border reveal reveal-delay-1">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Siapa saja yang dapat mengakses sistem ini?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body small text-muted">
                                    Halaman Landing Page terbuka untuk publik, sedangkan halaman dashboard pengelolaan agenda surat hanya dapat diakses oleh Admin berwenang melalui Login.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item card-tech mb-3 overflow-hidden border reveal reveal-delay-2">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Apa saja jenis surat yang didukung oleh sistem?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body small text-muted">
                                    Sistem dikhususkan untuk pencatatan dua kategori utama persuratan: **Surat Masuk** (diterima dari luar) dan **Surat Keluar** (diterbitkan oleh internal).
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item card-tech mb-3 overflow-hidden border reveal reveal-delay-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Bagaimana jika terdapat kesalahan saat memasukkan data surat?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body small text-muted">
                                    Admin dapat memanfaatkan fitur **Edit** pada tabel agenda surat di dashboard untuk memperbarui rincian informasi kapan saja.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-5 position-relative z-1 text-center">
        <div class="container py-4">
            <div class="card card-login p-5 text-center position-relative overflow-hidden reveal">
                <h2 class="fw-bold h3 mb-3">Siap Mengelola Agenda Surat Digital?</h2>
                <p class="small text-muted mb-4 max-w-xl mx-auto" style="max-width: 550px;">
                    Tingkatkan efisiensi kerja administrasi persuratan Anda sekarang juga dengan platform modern yang aman dan terstruktur.
                </p>
                <div>
                    @auth
                        <a href="{{ route('surat.index') }}" class="btn btn-neon-purple btn-lg px-5 fs-6">
                            <i class="bi bi-speedometer2 me-2"></i> Ke Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-neon-purple btn-lg px-5 fs-6">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Masuk Sistem Sekarang
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Resmi -->
    <footer class="mt-auto py-4 text-center border-top border-purple position-relative z-1" style="border-color: rgba(168, 85, 247, 0.2) !important;">
        <div class="container">
            <p class="small mb-0">&copy; {{ date('Y') }} <strong>AgendaSurat.Digital</strong></p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script Animasi Scroll Reveal & Count-Up -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const revealElements = document.querySelectorAll('.reveal');

            // Fungsi animasi hitung naik/turun untuk angka statistik
            function animateCounter(el) {
                const to = parseInt(el.getAttribute('data-count-to'), 10);
                const from = parseInt(el.getAttribute('data-count-from') || '0', 10);
                const suffix = el.getAttribute('data-suffix') || '';
                const duration = 1400; // durasi animasi dalam ms
                const startTime = performance.now();

                function easeOutQuad(t) {
                    return t * (2 - t);
                }

                function step(now) {
                    const elapsed = now - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const eased = easeOutQuad(progress);
                    const current = Math.round(from + (to - from) * eased);
                    el.textContent = current + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(step);
                    } else {
                        el.textContent = to + suffix; // pastikan angka akhir presisi
                    }
                }

                requestAnimationFrame(step);
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');

                        // Cari elemen counter di dalam elemen yang baru tampil, lalu jalankan animasinya
                        const counters = entry.target.querySelectorAll('.counter-value[data-count-to]');
                        counters.forEach(counter => animateCounter(counter));

                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -50px 0px'
            });

            revealElements.forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>