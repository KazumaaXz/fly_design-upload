@extends('layouts.frontend.master')

@section('title', 'User Dashboard')

@section('content')
    <div class="container-fluid min-vh-100">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <aside id="sidebar"
                class="col-auto col-md-2 px-3 bg-dark text-white d-flex flex-column min-vh-100 transition-all">
                <div class="d-flex justify-content-between align-items-center py-3">
                    <span class="fs-5 fw-bold d-none d-md-inline">Dashboard</span>
                    <button id="toggleSidebar" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
                <hr class="text-secondary">
                <!-- Menu -->
                <nav class="nav flex-column gap-2 flex-grow-1">
                    <a href="{{ route('home.main') }}" class="nav-link text-white d-flex align-items-center gap-2">
                        <i class="bi bi-house-door"></i> <span class="d-none d-md-inline">Home</span>
                    </a>
                    <a href="http://localhost:8000/articles/about" class="nav-link text-white d-flex align-items-center gap-2">
                        <i class="bi bi-info-circle"></i> <span class="d-none d-md-inline">About</span>
                    </a>
                    <a href="{{ route('home.articles.index') }}" class="nav-link text-white d-flex align-items-center gap-2">
                        <i class="bi bi-journal-text"></i> <span class="d-none d-md-inline">Blog</span>
                    </a>
                    <a href="{{ route('home.information.index') }}" class="nav-link text-white d-flex align-items-center gap-2">
                        <i class="bi bi-megaphone"></i> <span class="d-none d-md-inline">Informasi</span>
                    </a>
                    <a href="{{ route('home.team.index') }}" class="nav-link text-white d-flex align-items-center gap-2">
                        <i class="bi bi-person-badge"></i> <span class="d-none d-md-inline">Pengajar</span>
                    </a>
                    <a href="{{ route('home.contact.index') }}" class="nav-link text-white d-flex align-items-center gap-2">
                        <i class="bi bi-telephone"></i> <span class="d-none d-md-inline">Kontak</span>
                    </a>
                    <a href="{{ route('home.products.index') }}" class="nav-link text-white d-flex align-items-center gap-2">
                        <i class="bi bi-bag"></i> <span class="d-none d-md-inline">Produk</span>
                    </a>
                </nav>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="mt-auto mb-3">
                    @csrf
                    <button type="submit"
                        class="btn btn-link nav-link text-danger fw-semibold d-flex align-items-center gap-2">
                        <i class="bi bi-box-arrow-right"></i> <span class="d-none d-md-inline">Logout</span>
                    </button>
                </form>
            </aside>

            <!-- Main Content -->
            <main class="col p-4">
                <!-- Topbar -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <!-- Left: Logo -->
                    <div class="fw-bold fs-4 text-primary">
                        FlyDesign
                    </div>

                    <!-- Center: Search -->
                    <div class="flex-grow-1 mx-4 position-relative" style="max-width: 500px;">
                        <span class="position-absolute top-50 translate-middle-y ps-3 text-secondary">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control shadow-sm ps-5" placeholder="Search your course...">
                    </div>

                    <!-- Right: Actions -->
                    <div class="d-flex align-items-center gap-3">
                        <button id="darkModeToggle" class="btn btn-sm btn-outline-secondary rounded-circle">
                            <i class="bi bi-moon"></i>
                        </button>
                        <i class="bi bi-bell fs-5"></i>
                        <a href ="{{ route('user.profile') }}">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/standing.png') }}" class="rounded-circle me-2"
                                style="width:40px; height:40px; object-fit:cover;" alt="avatar">
                            <span class="fw-semibold">{{ Auth::user()->name ?? 'Guest' }}</span>
                        </div>
                    </div>

                </div>

                <div class="row g-4">
                    <!-- Left: Banner + Continue Watching + Lesson -->
                    <div class="col-md-8">
                        <!-- Banner -->
                        <div class="p-5 rounded-4 shadow-sm text-white banner mb-4">
                            <h2 class="fw-bold">Sharpen Your Skills with Professional Online Courses</h2>
                            <button class="btn btn-light text-primary mt-3 fw-semibold rounded-pill px-4">Join Now</button>
                        </div>

                        <!-- Categories -->
                        <div class="d-flex gap-3 mb-4">
                            <div class="px-4 py-2 rounded-pill bg-light shadow-sm">2/8 Watched <b>UI/UX Design</b></div>
                            <div class="px-4 py-2 rounded-pill bg-light shadow-sm">3/8 Watched <b>Branding</b></div>
                            <div class="px-4 py-2 rounded-pill bg-light shadow-sm">6/12 Watched <b>Front End</b></div>
                        </div>

                        <!-- Continue Watching -->
                        <h5 class="fw-bold mb-3">Continue Watching</h5>
                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <img src="https://source.unsplash.com/400x200/?laptop" class="card-img-top"
                                        alt="">
                                    <div class="card-body">
                                        <span class="badge bg-primary mb-2">Front End</span>
                                        <h6 class="fw-semibold">Beginner’s Guide to Becoming a Professional Front-End
                                            Developer</h6>
                                        <p class="small">Leonardo Samsul - Mentor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <img src="https://source.unsplash.com/400x200/?design" class="card-img-top"
                                        alt="">
                                    <div class="card-body">
                                        <span class="badge bg-purple mb-2">UI/UX Design</span>
                                        <h6 class="fw-semibold">Optimizing User Experience with the Best UI/UX Design</h6>
                                        <p class="small">Bayu Salto - Mentor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <img src="https://source.unsplash.com/400x200/?office" class="card-img-top"
                                        alt="">
                                    <div class="card-body">
                                        <span class="badge bg-pink mb-2">Branding</span>
                                        <h6 class="fw-semibold">Reviving and Refreshing Company Image</h6>
                                        <p class="small">Padang Satrio - Mentor</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Lesson -->
                        <h5 class="fw-bold mb-3">Your Lesson</h5>
                        <div class="card shadow-sm mb-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-0 fw-semibold">Padang Satrio</p>
                                    <small>2/6/2004</small>
                                </div>
                                <div><span class="badge bg-purple">UI/UX Design</span></div>
                                <div>Understand of UI/UX Design</div>
                                <div><a href="#" class="btn btn-sm btn-primary">→</a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Statistic + Mentor -->
                    <div class="col-md-4">
                        <!-- Statistic -->
                        <div class="card shadow-sm mb-4 p-4">
                            <h6 class="fw-bold mb-3 text-center">Statistic</h6>
                            <div class="row align-items-center">
                                <!-- Circular progress -->
                                <div class="col-md-6 text-center">
                                    <div class="progress-circle position-relative d-inline-block mb-3">
                                        <svg width="120" height="120">
                                            <circle cx="60" cy="60" r="54" stroke="#e9ecef"
                                                stroke-width="12" fill="none" />
                                            <circle cx="60" cy="60" r="54" stroke="#0d6efd"
                                                stroke-width="12" fill="none" stroke-dasharray="339.292"
                                                stroke-dashoffset="230" stroke-linecap="round" />
                                        </svg>
                                        <div
                                            class="position-absolute top-50 start-50 translate-middle fw-bold text-primary">
                                            32%
                                        </div>
                                    </div>
                                    <p class="small mt-2">Good Morning Jason 🔥<br>Keep learning to achieve your target!
                                    </p>
                                </div>

                                <!-- Bar chart -->
                                <div class="col-md-6">
                                    <canvas id="statChart" height="150"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Mentor -->
                        <div class="card shadow-sm p-3">
                            <h6 class="fw-bold mb-3">Your Mentor</h6>
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://i.pravatar.cc/40?img=10" class="rounded-circle me-2">
                                <div>
                                    <p class="mb-0 fw-semibold">Padang Satrio</p>
                                    <small>Mentor</small>
                                </div>
                                <button class="btn btn-sm btn-outline-primary ms-auto">Follow</button>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://i.pravatar.cc/40?img=11" class="rounded-circle me-2">
                                <div>
                                    <p class="mb-0 fw-semibold">Zakir Horizontal</p>
                                    <small>Mentor</small>
                                </div>
                                <button class="btn btn-sm btn-outline-primary ms-auto">Follow</button>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="https://i.pravatar.cc/40?img=12" class="rounded-circle me-2">
                                <div>
                                    <p class="mb-0 fw-semibold">Leonardo Samsul</p>
                                    <small>Mentor</small>
                                </div>
                                <button class="btn btn-sm btn-outline-primary ms-auto">Follow</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <style>
        #sidebar {
            width: 220px;
            transition: all 0.3s;
        }

        #sidebar.collapsed {
            width: 70px;
        }

        #sidebar.collapsed .nav-link span,
        #sidebar.collapsed .fw-bold,
        #sidebar.collapsed hr,
        #sidebar.collapsed .text-danger span {
            display: none !important;
        }

        .banner {
            background: #0d6efd;
        }

        .bg-purple {
            background: #6f42c1 !important;
        }

        .bg-pink {
            background: #e83e8c !important;
        }

        .dark-mode {
            background: #121212 !important;
            color: #e9ecef !important;
        }

        .dark-mode .card {
            background: #1e1e1e !important;
            color: #e9ecef !important;
        }

        .progress-circle svg {
            transform: rotate(-90deg);
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.getElementById("toggleSidebar").addEventListener("click", () => {
            document.getElementById("sidebar").classList.toggle("collapsed");
        });

        // Dark Mode
        const toggle = document.getElementById('darkModeToggle');
        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            let icon = toggle.querySelector("i");
            if (document.body.classList.contains("dark-mode")) {
                icon.classList.replace("bi-moon", "bi-sun");
            } else {
                icon.classList.replace("bi-sun", "bi-moon");
            }
        });

        // ChartJS
        new Chart(document.getElementById('statChart'), {
            type: 'bar',
            data: {
                labels: ['1-10 Aug', '11-20 Aug', '21-30 Aug'],
                datasets: [{
                    label: 'Progress',
                    data: [20, 40, 60],
                    backgroundColor: '#a78bfa'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 20
                        }
                    }
                }
            }
        });
    </script>
@endsection
