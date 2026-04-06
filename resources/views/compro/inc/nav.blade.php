    {{-- <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0"> --}}
    <nav class="navbar navbar-expand-lg shadow sticky-top p-0" style="background-color: #3B6998;">
        <a href="{{ route('home.index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-white d-flex align-items-center">
                <img src="https://kemenimipas.go.id/images/logo/Kementerian-Hukum-Dan-Ham-Kemenkumham-Logo-Vector.png"
                    alt="Imipas" style="height:35px;" class="me-2">

                <img src="https://media.licdn.com/dms/image/v2/C560BAQEORKYSEpYmvQ/company-logo_200_200/company-logo_200_200/0/1641759945715/direktorat_jenderal_pemasyarakatan_logo?e=1776902400&v=beta&t=uk5zJSYTOmXhP7SPG8SQ1r2wNuOuDs03hzgB0IO1vx8"
                    alt="Ditjenpas" style="height:35px; object-fit:contain;" class="me-3">

                Kemenimipas Ditjenpas
            </h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                {{-- <a href="{{ route('home.index') }}"
                    class="nav-item nav-link {{ Route::is('home.index') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about.index') }}"
                    class="nav-item nav-link {{ Route::is('about.index') ? 'active' : '' }}">About</a>
                <a href="{{ route('courses.index') }}"
                    class="nav-item nav-link {{ Route::is('courses.index') ? 'active' : '' }}">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#"
                        class="nav-link dropdown-toggle  {{ Route::is('testimonial.index') || Route::is('team.index') ? 'active' : '' }}"
                        data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{ route('team.index') }}"
                            class="dropdown-item  {{ Route::is('team.index') ? 'active' : '' }}">Our Team</a>
                        <a href="{{ route('testimonial.index') }}"
                            class="dropdown-item  {{ Route::is('testimonial.index') ? 'active' : '' }}">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div> --}}
                <a href="{{ route('contact.index') }}"
                    class="nav-item nav-link text-white {{ Route::is('contact.index') ? 'active' : '' }}">Buat pegawai</a>
            </div>
            <a href="{{ route('login.index') }}" class="btn btn-light py-4 px-lg-5 d-none d-lg-block">Admin Login<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
