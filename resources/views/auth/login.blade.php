
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyDesign</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Inter font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }

        .illustration-section {
            background: #e0e7ff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .illustration-section img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 0.75rem;
        }

        .form-section {
            padding: 40px 32px;
            background: #2b81fa;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-section h1 {
            font-size: 2.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .form-section p.lead {
            font-size: 1rem;
            margin-bottom: 2rem;
            color: #c0c0c0;
        }

        .form-control {
            border-radius: 0.75rem;
            padding: 12px 15px;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            margin-bottom: 1rem;
        }

        .form-control::placeholder {
            color: #e0e0e0;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.3);
            color: #fff;
            box-shadow: none;
        }

        .input-group-text {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: #fff;
            border-radius: 0 0.75rem 0.75rem 0;
        }

        .input-group .form-control {
            border-radius: 0.75rem 0 0 0.75rem;
            margin-bottom: 0;
        }

        .form-check-label {
            color: #e0e0e0;
            font-size: 0.95rem;
        }

        /* Hapus custom background agar ceklis default Bootstrap muncul */
        .form-check-input:checked {
            border-color: #007bff;
        }

        .btn-masuk {
            background: #200778;
            color: #fff;
            border: none;
            border-radius: 0.75rem;
            padding: 12px 0;
            font-weight: bold;
            font-size: 1.1rem;
            width: 100%;
            margin-top: 1rem;
            transition: background 0.2s;
        }

        .btn-masuk:hover {
            background: #1a055e;
            color: #ffd700;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.95rem;
            color: #e0e0e0;
        }

        .register-link a {
            color: #ffd700;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container login-container">
        <div class="row g-0">
            <div class="col-lg-6 illustration-section d-none d-lg-flex">
                <img src="assets/img/desain-grafis.jpg" alt="Grafis Illustration">
            </div>
            <div class="col-lg-6 form-section">
                <h1>Selamat Datang</h1>
                <p class="lead">Kursus Desain Grafis</p>
                <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
                                @csrf
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"
                                style="border-radius:0.75rem 0 0 0.75rem;">
                                <i class="fa-regular fa-user" style="color:#111112;"></i>
                            </span>
                            <input type="email" name="email" class="form-control border-start-0" id="email" placeholder="Alamat Email"
                                aria-label="Email"
                                style="border-radius:0 0.75rem 0.75rem 0; background:rgba(255,255,255,0.2); color:#fff;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"
                                style="border-radius:0.75rem 0 0 0.75rem;">
                                <i class="fa-solid fa-key" style="color:#111112;"></i>
                            </span>
                            <input type="password" name="password" class="form-control border-start-0" id="kataSandi"
                                placeholder="Kata Sandi" aria-label="Kata Sandi"
                                style="border-radius:0 0.75rem 0.75rem 0; background:rgba(255,255,255,0.2); color:#fff;">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ingatKataSandi">
                            <label class="form-check-label" for="ingatKataSandi">Ingat kata Sandi</label>
                        </div>
                        <a href="/forgot-password" class="form-check-label text-decoration-none" style="color: #ffd700;">Lupa kata
                            Sandi?</a>
                    </div>
                    <button type="submit" class="btn btn-masuk">Masuk</button>
                </form>
                <div class="mt-3 text-end">
                    <a href="/" class="text-decoration-none" style="color:#ffd700;font-size:0.95rem;">Kembali
                        ke Halaman Utama</a>
                </div>
                <div class="register-link">
                    Belum Memiliki Akun? <a href="/register">Daftar</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>