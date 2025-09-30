@extends('layouts.frontend.master')

@section('homeActive')
    active
@endsection
@section('content')
    <section class="bg-hero-gradient text-white py-5 py-md-5 rounded-bottom-4 mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-uppercase fw-bold fs-1 lh-tight mb-3">
                Belajar Desain Grafis Dengan <br> Berbagai Tools
            </h1>
            <p class="lead mb-4 mx-auto" style="max-width: 600px;">
                Kuasai Desain Web Modern, dari Nol hingga Mahir!
            </p>

            <!-- Hero Carousel -->
            <div id="heroCarousel" class="carousel slide mx-auto rounded-3 overflow-hidden shadow-lg" data-bs-ride="carousel"
                style="max-width: 800px;">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="ratio ratio-16x9">
                            <img src="{{ asset('assets/img/1.jpg') }}" class="d-block w-100 object-fit-cover"
                                alt="Ilustrasi web modern">
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="ratio ratio-16x9">
                            <img src="{{ asset('assets/img/2.jpeg') }}" class="d-block w-100 object-fit-cover"
                                alt="Ilustrasi web modern">
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="ratio ratio-16x9">
                            <img src="{{ asset('assets/img/3.jpg') }}" class="d-block w-100 object-fit-cover"
                                alt="Ilustrasi web modern">
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="carousel-item">
                        <div class="ratio ratio-16x9">
                            <img src="{{ asset('assets/img/4.jpeg') }}" class="d-block w-100 object-fit-cover"
                                alt="Ilustrasi web modern">
                        </div>
                    </div>
                </div>

                <!-- Tombol Next & Prev -->
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Sebelumnya</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Berikutnya</span>
                </button>
            </div>

            <!-- Call to Action Button -->
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
    <hr class="my-5">
    <div class="row gx-4">
        <h4 class="mb-4 fw-bold text-center">Artikel Terbaru</h4>
        <div class="col-lg-9 mx-auto">
            <div class="row">
                @forelse ($articles as $key => $val)
                    {{-- Skip the first article as it's used for featured --}}
                    @if ($key == 0 && !empty($articles) && count($articles) > 0)
                        @continue
                    @endif
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0 h-100 mb-3">
                            @if ($val->image)
                                <div class="ratio ratio-16x9">
                                    <img class="card-img-top" src="{{ asset('storage/' . $val->image) }}"
                                        alt="Gambar Artikel: {{ $val->title }}">
                                </div>
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center text-white-50 ratio ratio-16x9"
                                    style=" background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png'); background-size: cover; background-position: center;">
                                    MyBlog Image
                                </div>
                            @endif
                            <div class="card-body small d-flex flex-column">
                                <h5 class="card-title"><small>{{ $val->title }}</small></h5>
                                <p class="card-text flex-grow-1">
                                    <small>{{ Str::limit(strip_tags($val->meta_desc), 120) }}</small>
                                </p>
                                <a href="{{ route('home.articles.show', $val->slug) }}"
                                    class="btn btn-sm btn-primary mt-1 rounded-pill">Baca
                                    Artikel</a>
                            </div>
                            <div class="card-footer text-center">
                                <small class="text-muted">Diperbaharui:
                                    {{ $val->updated_at->format('d M Y') }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center" role="alert">
                            Belum ada artikel yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Our Clients Section -->
        <hr class="my-4">
        <section class="bg-white py-5">
            <div class="container">
                <h2 class="display-6 fw-bold text-center mb-5 text-dark">
                    Partner Kami
                </h2>
                <div class="row justify-content-center align-items-center text-center g-4">
                    <!-- Client 1 -->
                    <div class="col-6 col-md-3">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Client 1" class="img-fluid grayscale"
                            style="max-height: 60px;">
                    </div>
                    <!-- Client 2 -->
                    <div class="col-6 col-md-3">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Client 2" class="img-fluid grayscale"
                            style="max-height: 60px;">
                    </div>
                    <!-- Client 3 -->
                    <div class="col-6 col-md-3">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Client 3" class="img-fluid grayscale"
                            style="max-height: 60px;">
                    </div>
                    <!-- Client 4 -->
                    <div class="col-6 col-md-3">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Client 4" class="img-fluid grayscale"
                            style="max-height: 60px;">
                    </div>
                    <!-- Client 5 -->
                    <div class="col-6 col-md-3">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Client 5" class="img-fluid grayscale"
                            style="max-height: 60px;">
                    </div>
                    <!-- Client 6 -->
                    <div class="col-6 col-md-3">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Client 6" class="img-fluid grayscale"
                            style="max-height: 60px;">
                    </div>
                    <!-- Client 7 -->
                    <div class="col-6 col-md-3">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Client 7" class="img-fluid grayscale"
                            style="max-height: 60px;">
                    </div>
                    <!-- Client 8 -->
                    <div class="col-6 col-md-3">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Client 8" class="img-fluid grayscale"
                            style="max-height: 60px;">
                    </div>
                </div>
            </div>
        </section>

        <!-- Bootstrap 5 JavaScript CDN (Popper.js and Bootstrap JS) -->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        </body>

        </html>
    @endsection
