<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Pengajuan Akun WIFI | Portal Instansi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @include('compro.inc.css')

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            background: #f4f7fa;
            font-family: 'Inter', sans-serif;
            color: #334155;
        }

        /* ================= NAVBAR ================= */
        .navbar {
            background-color: #ffffff;
            border-bottom: 3px solid #241178;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
        }

        /* Logo Section */
        .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-right: 15px;
            border-right: 1px solid #d1d5db;
        }

        .brand-logo img {
            height: 48px;
            object-fit: contain;
        }

        /* Text Brand */
        .brand-text {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .brand-text-main {
            font-size: 15px !important;
            font-weight: 800 !important;
            color: #241178 !important;
            line-height: 1.2 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            font-family: 'Inter', sans-serif !important;
            margin: 0;
        }

        .brand-text-sub {
            font-size: 13px !important;
            color: #64748b !important;
            font-weight: 500 !important;
            line-height: 1.2 !important;
            font-family: 'Inter', sans-serif !important;
            margin: 0;
        }

        /* Buttons */
        .btn-custom {
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
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
            background: #111827;
            border-color: #111827;
        }

        /* Mobile */
        @media (max-width: 991.98px) {

            .navbar-collapse {
                background: #fff;
                padding: 1rem;
                border-radius: 15px;
                margin-top: 10px;
                box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            }

            .brand-text-main {
                font-size: 13px !important;
            }

            .brand-text-sub {
                font-size: 11px !important;
            }

            .brand-logo img {
                height: 40px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid px-lg-5">

            <!-- Logo + Brand -->
            <a href="{{ route('home.index') }}" class="navbar-brand">

                <div class="brand-logo d-none d-sm-flex">
                    <img src="https://kemenimipas.go.id/images/logo/Kementerian-Hukum-Dan-Ham-Kemenkumham-Logo-Vector.png"
                        alt="Logo 1">

                    <img src="{{ asset('asset/img/logo-imipas.jpg') }}"
                        alt="Logo 2">
                </div>

                <div class="brand-text">
                    <p class="brand-text-main">
                        Kementerian Imigrasi & Pemasyarakatan
                    </p>

                    <p class="brand-text-sub">
                        Direktorat Jenderal Pemasyarakatan
                    </p>
                </div>

            </a>

            <!-- Toggle Mobile -->
            <button class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">

                <svg width="28" height="28" viewBox="0 0 24 24"
                    fill="none" stroke="#241178" stroke-width="2.5">

                    <line x1="3" x2="21" y1="12" y2="12"/>
                    <line x1="3" x2="21" y1="6" y2="6"/>
                    <line x1="3" x2="21" y1="18" y2="18"/>

                </svg>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <div class="navbar-nav ms-auto gap-3 mt-4 mt-lg-0">

                    <a href="{{ route('contact.index') }}"
                        class="btn btn-custom btn-outline-pegawai">

                        <i class="fas fa-user-friends me-2"></i>
                        Pegawai
                    </a>

                    <a href="{{ route('login.index') }}"
                        class="btn btn-custom btn-dark-admin">

                        <i class="fas fa-user-shield me-2"></i>
                        Admin
                    </a>

                </div>

            </div>
        </div>
    </nav>

    @include('compro.inc.js')

</body>
</html>