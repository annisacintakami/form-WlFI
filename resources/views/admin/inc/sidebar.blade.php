<aside id="layout-menu" class="layout-menu">

    <style>
        #layout-menu {
            width: 270px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #1e293b;
            color: #f8fafc;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.05);
            z-index: 1080;
        }

        .app-brand {
            padding: 1.5rem 1.25rem;
        }

        .brand-logo-bg {
            background: #3b82f6;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .menu-inner {
            flex-grow: 1;
            padding: 0 15px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: #94a3b8;
            border-radius: 12px;
            text-decoration: none;
            margin-bottom: 4px;
        }

        .menu-link:hover {
            background: rgba(255,255,255,0.05);
            color: #fff;
        }

        .menu-item.active .menu-link {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: #fff;
        }

        .menu-header {
            margin: 20px 0 10px 20px;
            font-size: 0.7rem;
            color: #64748b;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            #layout-menu {
                transform: translateX(-100%);
                transition: 0.3s;
            }

            .layout-menu-expanded #layout-menu {
                transform: translateX(0);
            }
        }
    </style>

    <div class="app-brand d-flex align-items-center">
        <a href="{{ route('contactadmin.index') }}" class="d-flex align-items-center text-decoration-none text-white">
            <span class="brand-logo-bg">
                <i class="bx bx-wifi"></i>
            </span>
            <span class="fw-bold fs-5 ms-2">e-Connect</span>
        </a>
    </div>

    <ul class="menu-inner list-unstyled">

        <li class="menu-header">Menu Utama</li>

        <li class="menu-item {{ request()->routeIs('contactadmin.index') || request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('contactadmin.index') }}" class="menu-link">
                <i class="bx bx-grid-alt me-2"></i>
                <span>Daftar Pengajuan</span>
            </a>
        </li>

    </ul>

</aside>