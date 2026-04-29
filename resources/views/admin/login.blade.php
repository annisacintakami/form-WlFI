<!DOCTYPE html>
<html lang="id" class="light-style customizer-hide" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Login Admin | DITJENPAS</title>

    @include('admin.inc.head')

    <style>
        /* 🖼️ BACKGROUND OPTIMIZATION */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at center, rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.95)), 
                        url('{{ asset('asset/img/foto dirjenpas.jpg') }}');
            background-size: cover;
            background-position: center;
            font-family: 'Public Sans', -apple-system, sans-serif;
            overflow: hidden;
        }

        /* 🃏 PREMIUM GLASS CARD */
        .authentication-inner {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 480px; 
            padding: 24px;
        }

        .card {
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 32px;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
        }

        /* 🔘 GOOGLE BUTTON - HIGH CONTRAST */
        .btn-google-login {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #1e293b; /* Gelap agar kontras dengan card putih */
            color: #ffffff !important;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 16px 24px;
            border: none;
            border-radius: 18px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            width: 100%;
        }

        .btn-google-login:hover {
            background-color: #0f172a;
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(30, 41, 59, 0.3);
        }

        .btn-google-login img {
            width: 24px;
            margin-right: 14px;
            background: white;
            padding: 2px;
            border-radius: 5px;
        }

        /* 🏛️ BRANDING & DIVIDER */
        .app-brand-logo img {
            height: 85px;
            width: auto;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.1));
            margin-bottom: 10px;
        }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e2e8f0, transparent);
            margin: 25px 0;
        }

        .main-title {
            color: #0f172a;
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 5px;
        }

        .sub-title {
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.15em;
        }

        /* 💡 INSTRUCTION BOX */
        .instruction-text {
            color: #334155;
            background: #f8fafc;
            padding: 20px;
            border-radius: 20px;
            font-size: 0.95rem;
            line-height: 1.5;
            border-left: 5px solid #2563eb; /* Aksen warna biru untuk 'trust' */
            text-align: left;
            margin-bottom: 25px;
        }

        /* 📝 FOOTER */
        .footer-text {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 35px;
        }

        .copyright-year {
            color: #2563eb;
            font-weight: 700;
        }

        /* 🚀 ANIMATION */
        .fade-in-up {
            animation: fadeInUp 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 576px) {
            .authentication-inner { padding: 15px; }
            .card-body { padding: 1.5rem !important; }
            .main-title { font-size: 1.5rem; }
        }
    </style>
</head>

<body>
    <div class="authentication-inner fade-in-up">
        <div class="card border-0">
            <div class="card-body p-4 p-md-5">
                
                <div class="text-center">
                    <div class="app-brand justify-content-center mb-2">
                        <a href="#" class="app-brand-link">
                            <span class="app-brand-logo">
                                 <img src="{{ asset('asset/img/logo-ditjenpas2.png') }}" alt="Logo DITJENPAS">
                            </span>
                        </a>
                    </div>
                    <h3 class="main-title">DITJENPAS 2026</h3>
                    <p class="sub-title">Portal Administrasi Pusat</p>
                </div>

                <div class="divider"></div>

                <div class="mt-2">
                    <div class="instruction-text">
                        <div class="fw-bold mb-1 text-primary">
                            <i class="bx bx-info-circle me-1"></i> Perhatian:
                        </div>
                        Pastikan Anda masuk menggunakan akun email yang terdaftar di sistem kami.
                    </div>
                    
                    <a href="/auth/google" class="btn-google-login">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="Google Icon">
                        Lanjutkan dengan Google
                    </a>
                </div>

                <div class="footer-text text-center">
                    <p class="mb-1">
                        <span class="copyright-year">&copy; 2026 DITJENPAS IT TEAM</span>
                    </p>
                    <p class="mb-0 text-uppercase" style="letter-spacing: 0.5px;">Kementerian Imigrasi dan Pemasyarakatan</p>
                </div>

            </div>
        </div>
    </div>

    @include('admin.inc.js')
</body>
</html>