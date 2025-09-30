<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Desain Grafis</title>
    <!-- Css Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <!-- Vite -->
    @vite([])
    <!-- Inter font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            /* Light gray background */
            color: #343a40;
            /* Dark gray text */
        }

        /* Custom styles for rounded corners and shadows, adapted for Bootstrap */
        .card-custom {
            border-radius: 1rem;
            /* More rounded corners */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            /* Softer shadow */
        }

        /* Custom button for CTA to retain unique hover effect */
        .btn-cta-custom {
            padding: 0.75rem 2rem;
            border-radius: 0.75rem;
            /* Rounded button */
            transition: transform 0.3s ease;
            /* Only for transform effect */
        }

        .btn-cta-custom:hover {
            transform: scale(1.05);
        }

        .hero-image {
            border-radius: 1rem;
            object-fit: cover;
            /* Ensure image covers the area */
        }

        /* Styling for Font Awesome icons */
        .icon-feature {
            font-size: 3.5rem;
            /* Larger icon size */
            margin-bottom: 1rem;
        }

        /* Custom gradient backgrounds for sections */
        .bg-hero-gradient {
            background: linear-gradient(to right, #0d6efd, #6610f2);
            /* Bootstrap primary and indigo-like */
        }

        .bg-cta-gradient {
            background: linear-gradient(to right, #0a58ca, #560dc9);
            /* Slightly darker primary and indigo-like */
        }
    </style>
</head>

<body class="antialiased">

    <!-- Header Section -->
    <header class="bg-white shadow py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo or Brand Name -->
            <div class="fs-4 fw-bold text-primary"><i class="fa-brands fa-fly me-3"></i>FlyDesign</div>
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item me-3">
                                <a class="nav-link text-dark" href="./index.html">Home</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link text-dark" href="./about.html">About</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link text-dark" href="./materi.html">Materi</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link text-dark" href="./pengajar.html">Pengajar</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link text-dark" href="./contact.html">Contact us</a>
                            </li>
                            <li class="nav-item">
                                <a href="./login.html" class="btn btn-primary rounded-pill px-4">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-hero-gradient text-white py-5 py-md-5 rounded-bottom-4 mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-uppercase fw-bold fs-1 lh-tight mb-3">
                Belajar Desain Grafis Dengan <br> Berbagai Tools
            </h1>
            <p class="lead mb-4 mx-auto" style="max-width: 600px;">
                Kuasai Desain Web Modern, dari Nol hingga Mahir!
            </p>
            <!-- Hero Image -->
            <div class="mx-auto rounded-3 overflow-hidden shadow-lg" style="max-width: 800px;">
                <img src="img/menarik.jpg" alt="Ilustrasi laptop dengan desain web atau tools desain grafis"
                    class="img-fluid hero-image">
            </div>
            <a href="#daftar" class="btn btn-light btn-lg mt-4 fw-semibold btn-cta-custom">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <!-- Why Choose This Course Section -->
    <section id="tentang" class="container py-5">
        <h2 class="display-6 fw-bold text-center mb-5 text-dark">
            Mengapa Memilih Kursus Ini?
        </h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Feature 1: Fokus pada Desain Visual -->
            <div class="col">
                <div class="card h-100 shadow-sm text-center card-custom p-4">
                    <div class="text-primary icon-feature mx-auto"><i class="fas fa-palette"></i></div>
                    <h3 class="h5 fw-semibold mb-2">Fokus pada Desain Visual</h3>
                    <p class="text-muted">Pelajari prinsip-prinsip desain grafis seperti tipografi, warna, tata letak,
                        dan hierarki visual, yang semuanya diimplementasikan dengan CSS.</p>
                </div>
            </div>
            <!-- Feature 2: Praktis dengan Bootstrap 5 -->
            <div class="col">
                <div class="card h-100 shadow-sm text-center card-custom p-4">
                    <div class="text-success icon-feature mx-auto"><i class="fas fa-rocket"></i></div>
                    <h3 class="h5 fw-semibold mb-2">Praktis dengan Bootstrap 5</h3>
                    <p class="text-muted">Bangun proyek nyata dari awal dengan Bootstrap 5, framework yang memudahkan
                        Anda membuat desain responsif dan mobile-first.</p>
                </div>
            </div>
            <!-- Feature 3: Cocok untuk Pemula -->
            <div class="col">
                <div class="card h-100 shadow-sm text-center card-custom p-4">
                    <div class="text-warning icon-feature mx-auto"><i class="fas fa-seedling"></i></div>
                    <h3 class="h5 fw-semibold mb-2">Cocok untuk Pemula</h3>
                    <p class="text-muted">Tidak perlu pengalaman coding sebelumnya. Kami akan memulai dari konsep paling
                        dasar dan membangun pemahaman Anda secara bertahap.</p>
                </div>
            </div>
            <!-- Feature 4: Materi Komprehensif -->
            <div class="col">
                <div class="card h-100 shadow-sm text-center card-custom p-4">
                    <div class="text-danger icon-feature mx-auto"><i class="fas fa-book"></i></div>
                    <h3 class="h5 fw-semibold mb-2">Materi Komprehensif</h3>
                    <p class="text-muted">Dari dasar CSS hingga komponen canggih Bootstrap 5, Anda akan mendapatkan
                        pemahaman mendalam yang siap pakai.</p>
                </div>
            </div>
            <!-- Feature 5: Dukungan Penuh -->
            <div class="col">
                <div class="card h-100 shadow-sm text-center card-custom p-4">
                    <div class="text-info icon-feature mx-auto"><i class="fas fa-handshake"></i></div>
                    <h3 class="h5 fw-semibold mb-2">Dukungan Penuh</h3>
                    <p class="text-muted">Tim instruktur kami siap membantu Anda melalui setiap tantangan dan pertanyaan
                        yang Anda miliki.</p>
                </div>
            </div>
            <!-- Feature 6: Skill Siap Kerja -->
            <div class="col">
                <div class="card h-100 shadow-sm text-center card-custom p-4">
                    <div class="text-secondary icon-feature mx-auto"><i class="fas fa-lightbulb"></i></div>
                    <h3 class="h5 fw-semibold mb-2">Skill Siap Kerja</h3>
                    <p class="text-muted">Bekali diri Anda dengan keterampilan desain web yang sangat dicari di industri
                        saat ini.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- What You Will Learn Section -->
    <section id="materi" class="bg-light py-5">
        <div class="container">
            <h2 class="display-6 fw-bold text-center mb-5 text-dark">
                Apa yang Akan Anda Pelajari?
            </h2>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <!-- Learning Point 1 -->
                <div class="col">
                    <div class="card h-100 shadow-sm card-custom p-4">
                        <h3 class="h5 fw-semibold mb-2 text-primary">Pengantar Desain Grafis untuk Web</h3>
                        <p class="text-muted">Memahami elemen kunci desain visual dan bagaimana menerapkannya pada
                            antarmuka web.</p>
                    </div>
                </div>
                <!-- Learning Point 2 -->
                <div class="col">
                    <div class="card h-100 shadow-sm card-custom p-4">
                        <h3 class="h5 fw-semibold mb-2 text-primary">Dasar-dasar CSS</h3>
                        <p class="text-muted">Selektor, properti, model box, layout dasar, Flexbox, Grid, dan banyak
                            lagi.</p>
                    </div>
                </div>
                <!-- Learning Point 3 -->
                <div class="col">
                    <div class="card h-100 shadow-sm card-custom p-4">
                        <h3 class="h5 fw-semibold mb-2 text-primary">Mengenal Bootstrap 5</h3>
                        <p class="text-muted">Sistem Grid, komponen navigasi, card, form, utilitas responsif, dan ikon.
                        </p>
                    </div>
                </div>
                <!-- Learning Point 4 -->
                <div class="col">
                    <div class="card h-100 shadow-sm card-custom p-4">
                        <h3 class="h5 fw-semibold mb-2 text-primary">Kustomisasi Desain</h3>
                        <p class="text-muted">Mengubah dan menyesuaikan tema Bootstrap agar sesuai dengan identitas
                            visual Anda.</p>
                    </div>
                </div>
                <!-- Learning Point 5 -->
                <div class="col">
                    <div class="card h-100 shadow-sm card-custom p-4">
                        <h3 class="h5 fw-semibold mb-2 text-primary">Praktik Desain Responsif</h3>
                        <p class="text-muted">Membuat website yang terlihat sempurna di berbagai ukuran layar (desktop,
                            tablet, mobile).</p>
                    </div>
                </div>
                <!-- Learning Point 6 -->
                <div class="col">
                    <div class="card h-100 shadow-sm card-custom p-4">
                        <h3 class="h5 fw-semibold mb-2 text-primary">Membangun Proyek Nyata</h3>
                        <p class="text-muted">Menerapkan semua yang telah Anda pelajari untuk membuat landing page,
                            portofolio, atau website sederhana lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who Should Attend Section -->
    <section class="container py-5">
        <h2 class="display-6 fw-bold text-center mb-5 text-dark">
            Siapa yang Harus Mengikuti Kursus Ini?
        </h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Audience 1: Calon Desainer Web -->
            <div class="col">
                <div class="card h-100 shadow-sm text-center card-custom p-4">
                    <div class="text-primary icon-feature mx-auto"><i class="fas fa-laptop-code"></i></div>
                    <h3 class="h5 fw-semibold mb-2">Calon Desainer Web</h3>
                    <p class="text-muted">Individu yang tertarik pada desain web namun minim pengalaman coding.</p>
                </div>
            </div>
            <!-- Audience 2: Desainer Grafis -->
            <div class="col">
                <div class="card h-100 shadow-sm text-center card-custom p-4">
                    <div class="text-success icon-feature mx-auto"><i class="fas fa-paint-brush"></i></div>
                    <h3 class="h5 fw-semibold mb-2">Desainer Grafis</h3>
                    <p class="text-muted">Desainer grafis yang ingin memperluas skillset mereka ke ranah web dan
                        interaktif.</p>
                </div>
            </div>
            <!-- Audience 3: Pengusaha & Freelancer -->
            <div class="col">
                <div class="card h-100 shadow-sm text-center card-custom p-4">
                    <div class="text-info icon-feature mx-auto"><i class="fas fa-briefcase"></i></div>
                    <h3 class="h5 fw-semibold mb-2">Pengusaha & Freelancer</h3>
                    <p class="text-muted">Siapa saja yang ingin membangun atau mempercantik tampilan website mereka
                        sendiri.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="daftar" class="bg-cta-gradient text-white py-5 text-center rounded-top-4 mt-5">
        <div class="container">
            <h2 class="display-6 fw-bold mb-3">
                Siap Memulai Petualangan Desain Anda?
            </h2>
            <p class="lead mb-4 mx-auto" style="max-width: 600px;">
                Jangan lewatkan kesempatan untuk menjadi desainer web yang mahir dan menciptakan tampilan website yang
                luar biasa.
            </p>
            <a href="login.html" class="btn btn-light btn-lg fw-bold btn-cta-custom">
                Daftar Sekarang!
            </a>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-dark text-white-50 py-4">
        <div class="container text-center">
            <p class="mb-2">
                <a href="#" class="text-white-50 text-decoration-none hover:text-white">Tentang Kami</a> |
                <a href="#" class="text-white-50 text-decoration-none hover:text-white">Kontak</a> |
                <a href="#" class="text-white-50 text-decoration-none hover:text-white">Kebijakan Privasi</a>
            </p>
            <p>&copy; 2025 DesainPro. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JavaScript CDN (Popper.js and Bootstrap JS) -->
    <script src"{{asset('assets/js/bootstrap.min.js')}}"></script>
</body>

</html>