<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Pengajuan Akun WIFI | Portal Instansi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @include('compro.inc.css')

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background: #f4f7fa;
            font-family: 'Inter', sans-serif;
            color: #334155;
            margin: 0;
            padding: 0;
        }

        /* ================= NAVBAR ================= */
        .navbar {
            background-color: #ffffff;
            border-bottom: 3px solid #241178;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            flex-shrink: 1;
            min-width: 0;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-right: 15px;
            border-right: 2px solid #e2e8f0;
            flex-shrink: 0;
        }

        .brand-logo img {
            height: 45px;
            width: auto;
            object-fit: contain;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-width: 0;
        }

        .brand-text-main {
            font-size: 15px !important;
            font-weight: 800 !important;
            color: #241178 !important;
            line-height: 1.2 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            margin: 0;
            white-space: normal;
        }

        .brand-text-sub {
            font-size: 13px !important;
            color: #64748b !important;
            font-weight: 500 !important;
            line-height: 1.2 !important;
            margin: 0;
        }

        .btn-custom {
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-outline-pegawai {
            background: transparent;
            border: 2px solid #3B6998;
            color: #3B6998;
        }

        .btn-outline-pegawai:hover {
            background: #3B6998;
            color: white;
        }

        .btn-dark-admin {
            background: #1B2340;
            border: 2px solid #1B2340;
            color: white;
        }

        .btn-dark-admin:hover {
            background: #0f172a;
            border-color: #0f172a;
            color: white;
        }

        /* ================= RESPONSIVE ADJUSTMENTS ================= */

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: #ffffff;
                margin-top: 15px;
                padding: 20px;
                border-radius: 12px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            }

            .navbar-nav {
                flex-direction: column;
                width: 100%;
            }

            .btn-custom {
                width: 100%;
                justify-content: center;
                margin-bottom: 5px;
            }
        }

        @media (max-width: 767.98px) {
            .brand-text-main {
                font-size: 13px !important;
            }

            .brand-text-sub {
                font-size: 11px !important;
            }
        }

        @media (max-width: 575.98px) {
            .container-fluid {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            .brand-logo {
                padding-right: 8px;
                gap: 5px;
                border-right-width: 1px;
            }

            .brand-logo img {
                height: 32px;
            }

            .brand-text-main {
                font-size: 11px !important;
                letter-spacing: 0;
            }

            .brand-text-sub {
                font-size: 9px !important;
            }

            .navbar-toggler {
                padding: 4px;
            }

            .navbar-toggler svg {
                width: 24px;
                height: 24px;
            }
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid px-lg-5">

            <a href="{{ route('home.index') }}" class="navbar-brand">
                <div class="brand-logo">
                    <img src="https://kemenimipas.go.id/images/logo/Kementerian-Hukum-Dan-Ham-Kemenkumham-Logo-Vector.png"
                        alt="Logo Kemenkumham">

                    <img src="{{ asset('asset/img/logo-imipas.jpg') }}" alt="Logo IMIPAS">
                </div>

                <div class="brand-text">
                    <p class="brand-text-main">Kementerian Imigrasi & Pemasyarakatan</p>
                    <p class="brand-text-sub">Direktorat Jenderal Pemasyarakatan</p>
                </div>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">

                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#241178" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto gap-2 gap-lg-3">

                    <a href="{{ route('contact.index') }}" class="btn-custom btn-outline-pegawai">
                        <i class="fas fa-user-friends me-2"></i>
                        Pegawai
                    </a>

                    <a href="{{ route('login.index') }}" class="btn-custom btn-dark-admin">
                        <i class="fas fa-user-shield me-2"></i>
                        Admin
                    </a>

                </div>
            </div>

        </div>
    </nav>

    <main class="container my-5">
        @yield('content')
    </main>

    @include('compro.inc.js')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbarCollapse = document.getElementById('navbarCollapse');
            const navbarToggler = document.querySelector('.navbar-toggler');

            // 1. Tutup menu jika pengguna mengklik di luar area navbar
            document.addEventListener('click', function (event) {
                const isClickInsideNavbar = navbarCollapse.contains(event.target) || navbarToggler.contains(event.target);
                const isMenuOpen = navbarCollapse.classList.contains('show');

                if (isMenuOpen && !isClickInsideNavbar) {
                    // Gunakan API Bootstrap untuk menutup menu
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            });

            // 2. Tutup menu otomatis jika layar di-scroll (user tidak jadi memilih)
            window.addEventListener('scroll', function () {
                const isMenuOpen = navbarCollapse.classList.contains('show');
                if (isMenuOpen) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            });

            // 3. (Opsional) Tutup menu jika tombol menu diklik (untuk navigasi satu halaman/anchor link)
            const navLinks = document.querySelectorAll('.navbar-nav .btn-custom');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (navbarCollapse.classList.contains('show')) {
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                        bsCollapse.hide();
                    }
                });
            });
        });
    </script>

</body>

</html>