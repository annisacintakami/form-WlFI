<aside id="layout-menu" class="layout-menu">

    <style>
        #layout-menu {
            width: 270px;
            min-height: 100vh;
            background: #1e293b;
            color: #f8fafc;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.05);
        }

        /* Brand Section */
        #layout-menu .app-brand {
            padding: 1.5rem 1.25rem;
            margin-bottom: 10px;
        }

        #layout-menu .app-brand-link {
            color: #fff;
            gap: 12px;
            transition: all 0.3s ease;
        }

        #layout-menu .brand-logo-bg {
            background: #3b82f6;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.5);
        }

        /* Menu Items */
        #layout-menu .menu-inner {
            flex-grow: 1;
            padding: 0 15px;
        }

        #layout-menu .menu-link {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 4px;
            transition: all 0.25s ease;
            font-weight: 500;
        }

        #layout-menu .menu-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            transform: translateX(5px);
        }

        /* ACTIVE (WARNA BIRU) */
        #layout-menu .menu-item.active .menu-link {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: #ffffff;
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        }

        #layout-menu .menu-icon {
            font-size: 1.25rem;
            margin-right: 12px;
            transition: 0.3s;
        }

        /* Section Headers */
        #layout-menu .menu-header {
            margin: 20px 0 10px 20px;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #64748b;
            font-weight: 700;
        }
    </style>

    <div class="app-brand d-flex align-items-center">
        <a href="{{ route('contactadmin.index') }}" class="app-brand-link d-flex align-items-center text-decoration-none">
            <span class="brand-logo-bg">
                <i class="bx bx-wifi text-white fs-4"></i>
            </span>
            <span class="fw-bold fs-5 tracking-tight text-white">e-Connect</span>
        </a>
    </div>

    <ul class="menu-inner list-unstyled">
        
        <li class="menu-header">Menu Utama</li>

        {{-- 🔥 PERBAIKAN DI SINI (ACTIVE OTOMATIS) --}}
        <li class="menu-item {{ request()->routeIs('contactadmin.index') || request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('contactadmin.index') }}" class="menu-link">
                <i class="menu-icon bx bx-grid-alt"></i>
                <span>Daftar Pengajuan</span>
            </a>
        </li>

    </ul>

</aside>