<!doctype html>
<html lang="id">

<head>
    @include('layouts.frontend.head')
    @include('layouts.frontend.style')
    @vite([])

    <style>
        body {
            background-color: #e6edff;
            font-family: 'Poppins', sans-serif;
            position: relative;
        }

        /* Background dekorasi */
        .bg-decor {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: #c9d8ff;
            border-radius: 30% 70% 70% 30% / 40% 40% 60% 60%;
            opacity: 0.4;
            z-index: 1;
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        .auth-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            width: 900px;
            max-width: 100%;
            overflow: hidden;
        }

        /* Bagian kiri (gambar ilustrasi) */
        .auth-left {
            flex: 1;
            background: #f0f5ff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .auth-left img {
            max-width: 90%;
        }

        /* Bagian kanan (form register) */
        .auth-right {
            flex: 1;
            background: #ffffff;
            padding: 50px 40px;
        }

        .auth-right h2 {
            font-weight: 700;
            color: #1e40af;
        }

        .auth-right p {
            color: #6b7280;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            padding: 12px 14px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #2563eb;
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
        }

        .btn-primary {
            background: #2563eb;
            border: none;
            border-radius: 10px;
            padding: 12px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .footer-links {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Background dekorasi -->
    <div class="bg-decor"></div>

    <div class="auth-container">
        <div class="auth-card">
            <!-- Bagian kiri (gambar ilustrasi) -->
            <div class="auth-left">
                <img src="https://cdn-icons-png.flaticon.com/512/747/747086.png" alt="Register Illustration">
            </div>

            <!-- Bagian kanan (form register) -->
            <div class="auth-right">
                <h2 class="mb-2">Daftar Akun Baru</h2>
                <p class="mb-4">Gabung dan mulai petualangan kreatifmu 🚀</p>

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama & Email -->
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap"
                                required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Alamat Email"
                                required>
                        </div>
                    </div>

                    <!-- Password & Konfirmasi -->
                    <div class="row">
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Konfirmasi Password" required>
                        </div>
                    </div>

                    <!-- Jenis Kelamin & Telepon -->
                    <div class="row">
                        <div class="col-md-6">
                            <select name="gender" class="form-select" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" class="form-control" placeholder="Nomor Telepon"
                                required>
                        </div>
                    </div>

                    <!-- Instagram & File Upload -->
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="instagram" class="form-control"
                                placeholder="Username Instagram (Opsional)">
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Daftar</button>
                </form>

                <div class="footer-links mt-4">
                    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
                    <p>Kembali ke Halaman <a href="/">Home</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
