<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Agenda Surat Digital</title>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 position-relative p-3">

    <div class="glow-bg"></div>

    <div class="card card-login p-4 p-sm-5 my-auto" style="max-width: 420px; width: 100%;">
        <div class="text-center mb-4">
            <div class="icon-box mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.8rem;">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h4 class="fw-bold mb-1" style="color: #ffffff !important;">Login Admin</h4>
            <p style="color: #c084fc !important;" class="small">Masuk untuk mengelola agenda surat</p>
        </div>

        @if(session('error'))
            <div class="alert custom-alert-danger text-center mb-4 py-2.5 rounded-3 shadow-sm">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert custom-alert-danger text-center mb-4 py-2.5 rounded-3 shadow-sm">
                <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label small fw-semibold" style="color: #e9d5ff !important;">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-dark border-end-0" style="border-color: rgba(168, 85, 247, 0.35); color: #c084fc !important;">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" class="form-control border-start-0 ps-0 @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username" autofocus required>
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label small fw-semibold" style="color: #e9d5ff !important;">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-dark border-end-0" style="border-color: rgba(168, 85, 247, 0.35); color: #c084fc !important;">
                        <i class="bi bi-key"></i>
                    </span>
                    <input type="password" class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-neon-purple w-100 py-2.5 mb-3 fw-bold">
                <i class="bi bi-box-arrow-in-right me-2"></i> Masuk Sekarang
            </button>
        </form>

        <div class="text-center">
            <a href="{{ route('landing') }}" class="text-decoration-none small hover-purple">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
