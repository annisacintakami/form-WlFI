<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Admin Pengajuan WIFI</title>

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    @include('admin.inc.head')

    <!-- 🔷 CUSTOM STYLE -->
    <style>
        body {
            background: #f5f7fb;
        }

        /* Navbar */
        .layout-navbar {
            background: #fff !important;
            border-radius: 12px;
            margin: 12px;
            padding: 10px 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        /* 🔍 SEARCH */
        .search-box {
            position: relative;
        }

        .search-input {
            width: 260px;
            border-radius: 20px;
            padding-left: 40px;
            background: #f1f3f9;
            border: none;
            transition: 0.3s;
        }

        .search-input:focus {
            background: #fff;
            box-shadow: 0 0 0 2px rgba(13,110,253,0.2);
            width: 320px;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        /* Notif */
        .notif {
            position: relative;
        }

        .notif-badge {
            font-size: 10px;
            padding: 4px 6px;
        }

        /* Card */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        /* 📱 Responsive */
        @media (max-width: 768px) {
            .search-input {
                width: 150px;
            }

            .search-input:focus {
                width: 200px;
            }
        }

        @media (max-width: 480px) {
            .search-input {
                width: 120px;
            }
        }
    </style>
</head>

<body>

<div class="layout-wrapper layout-content-navbar">
<div class="layout-container">

    <!-- SIDEBAR -->
    @include('admin.inc.sidebar')

    <!-- MAIN -->
    <div class="layout-page">

        <!-- NAVBAR -->
        <nav class="layout-navbar navbar navbar-expand-xl align-items-center">

            <!-- Toggle -->
            <div class="layout-menu-toggle d-xl-none me-2">
                <a href="javascript:void(0)">
                    <i class="bx bx-menu fs-4"></i>
                </a>
            </div>

            <!-- 🔍 SEARCH -->
            <form action="{{ route('contactadmin.index') }}" method="GET" class="search-box me-auto">
                <i class="bx bx-search search-icon"></i>
                <input 
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control form-control-sm search-input"
                    placeholder="Cari data..."
                >
            </form>

            <!-- RIGHT MENU -->
            <ul class="navbar-nav flex-row align-items-center">

                <!-- 🔔 NOTIF -->
                <li class="nav-item me-3 notif">
                    <a href="{{ route('contactadmin.index') }}" class="text-dark">
                        <i class="bi bi-bell fs-5"></i>

                        @if(($newMessage ?? 0) > 0)
                        <span class="badge bg-danger notif-badge position-absolute top-0 start-100 translate-middle">
                            {{ $newMessage }}
                        </span>
                        @endif
                    </a>
                </li>

                <!-- 👤 USER -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <img src="https://api.dicebear.com/9.x/adventurer/svg?seed={{ session('admin')->name ?? 'Admin' }}"
                             class="rounded-circle"
                             width="36">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li class="px-3 py-2">
                            <strong>{{ session('admin')->name ?? 'Admin' }}</strong><br>
                            <small class="text-muted">Administrator</small>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item">
                                    <i class="bx bx-power-off me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>

        <!-- CONTENT -->
        <div class="content-wrapper">

            <div class="container-xxl container-p-y">

                <div class="card p-3">
                    <h5 class="text-primary fw-semibold mb-3">
                        @yield('title')
                    </h5>

                    @yield('content')

                </div>

            </div>

        </div>

    </div>
</div>
</div>

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@include('admin.inc.js')

</body>
</html>