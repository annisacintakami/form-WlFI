<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Admin Pengajuan WIFI</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @include('admin.inc.head')

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

        /* 🔍 SEARCH BOX ENHANCEMENT */
        .search-box {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input {
            width: 260px;
            border-radius: 20px;
            padding-left: 40px;
            padding-right: 40px; /* Ruang untuk ikon close */
            background: #f1f3f9;
            border: 1.5px solid transparent;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            background: #fff;
            border-color: #696cff;
            box-shadow: 0 0 8px rgba(105, 108, 255, 0.15);
            width: 320px;
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #a1acb8;
            font-size: 1.2rem;
            pointer-events: none;
            z-index: 5;
        }

        /* ❌ CLOSE/CLEAR BUTTON */
        .clear-search {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #a1acb8;
            display: none; /* Sembunyi secara default */
            cursor: pointer;
            transition: 0.2s;
            z-index: 5;
            line-height: 1;
        }

        .clear-search:hover {
            color: #ff3e1d;
        }

        /* Tampilkan tombol clear hanya jika input tidak kosong */
        .search-input:not(:placeholder-shown) ~ .clear-search {
            display: block;
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
        .layout-menu-collapsed #layout-menu {
    width: 80px !important;
}

.layout-menu-collapsed #layout-menu .menu-link {
    justify-content: center;
}

.layout-menu-collapsed #layout-menu .menu-icon {
    margin-right: 0;
}

#layout-menu {
    transition: all 0.3s ease;
}

        /* 📱 Responsive */
        @media (max-width: 768px) {
            .search-input { width: 150px; }
            .search-input:focus { width: 180px; }
        }

        /* Sidebar collapse */
.layout-menu-collapsed #layout-menu {
    width: 80px !important;
}

.layout-menu-collapsed .layout-page {
    margin-left: 80px !important;
}

/* Sembunyikan teks sidebar saat collapse */
.layout-menu-collapsed #layout-menu span {
    display: none;
}
#layout-menu,
.layout-page {
    transition: all 0.3s ease;
}

    </style>
</head>

<body>

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('admin.inc.sidebar')

        <div class="layout-page">

            <nav class="layout-navbar navbar navbar-expand-xl align-items-center">

                {{-- <div class="layout-menu-toggle me-2"> --}}
                    {{-- <a href="javascript:void(0)"> --}}
                        {{-- <i class="bx bx-menu fs-4"></i> --}}
                    {{-- </a> --}}
                {{-- </div> --}}

                <form action="{{ route('contactadmin.index') }}" method="GET" class="search-box me-auto" id="searchForm">
                    <i class="bx bx-search search-icon"></i>
                    
                    <input 
                        type="text"
                        name="search"
                        id="searchInput"
                        value="{{ request('search') }}"
                        class="form-control search-input"
                        placeholder="Cari data..."
                        autocomplete="off"
                    >

                    <a href="{{ route('contactadmin.index') }}" class="clear-search" title="Bersihkan pencarian">
                        <i class="bx bx-x fs-4"></i>
                    </a>
                </form>

                <ul class="navbar-nav flex-row align-items-center">

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
                                        <i class="bx bx-power-off me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

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

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@include('admin.inc.js')

<script>
    $(document).ready(function() {
        const searchInput = $('#searchInput');
        const searchForm = $('#searchForm');

        // Menghindari spam submit saat mengetik (Debounce)
        let timeout = null;
        searchInput.on('keyup', function() {
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                // Submit hanya jika ada perubahan signifikan atau input dikosongkan
                searchForm.submit();
            }, 700); // Eksekusi setelah 0.7 detik berhenti mengetik
        });
    });

    
 
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.querySelector(".layout-menu-toggle");
    const layout = document.querySelector(".layout-wrapper");

    if (toggleBtn && layout) {
        toggleBtn.addEventListener("click", function () {
            layout.classList.toggle("layout-menu-collapsed");
        });
    }

    // Auto collapse di mobile
    if (window.innerWidth < 768) {
        layout.classList.add("layout-menu-collapsed");
    }
});


</script>

</body>
</html>