<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Pengajuan Akun WIFI | Portal Instansi</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @include('compro.inc.css')

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    

    <style>
        :root {
            --primary-blue: #1e3a8a;
            --secondary-blue: #1e4e79;
            --accent-gold: #FFD700;
            --soft-slate: #f4f7fa;
            --text-dark: #1e293b;
        }

        body {
            background: var(--soft-slate);
            font-family: 'Inter', -apple-system, sans-serif;
            color: var(--text-dark);
        }

        /* HEADER SECTION */
        .header-section {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            padding: 80px 20px 110px;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header-section::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: #d4af37;
        }

        .header-section h2 {
            font-weight: 800;
            letter-spacing: -0.025em;
            margin-bottom: 12px;
            text-transform: uppercase;
            font-size: 2rem;
            color: var(--accent-gold);
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
            font-family: 'Inter', sans-serif !important;
        }

        .header-section p {
            margin: 0;
            opacity: 0.9;
            font-size: 1.1rem;
            font-weight: 300;
            font-family: 'Inter', sans-serif !important;
        }

        /* FORM CARD */
        .form-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 50px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0,0,0,0.05);
            margin-top: -60px;
            position: relative;
            z-index: 10;
        }

        /* INFO BOX */
        .info-box {
            background: #f0f7ff;
            border-left: 5px solid var(--secondary-blue);
            padding: 20px;
            border-radius: 14px;
            margin-bottom: 35px;
            display: flex;
            align-items: center;
            color: var(--secondary-blue);
        }

        .info-box i {
            font-size: 1.5rem;
            margin-right: 15px;
        }

        /* LABEL & INPUT STYLING */
        .form-label {
            font-weight: 700;
            margin-bottom: 10px;
            color: #334155;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
        }

        .form-label i {
            margin-right: 8px;
            color: var(--secondary-blue);
            width: 20px;
            text-align: center;
        }

        .form-control, .form-select {
            border-radius: 12px;
            padding: 14px 18px;
            border: 2px solid #e2e8f0;
            background-color: #f8fafc;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            background-color: #fff;
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 4px rgba(30, 78, 121, 0.1);
            outline: none;
        }

        /* BUTTONS */
        .btn-submit {
            background: var(--secondary-blue)!important;
            color: #ffffff !important;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            padding: 18px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            letter-spacing: 0.8px;
            text-transform: uppercase;
            box-shadow: 0 8px 15px rgba(30, 78, 121, 0.2);
        }

        .btn-submit:hover {
            background: var(--primary-blue);
            transform: translateY(-3px);
            box-shadow: 0 15px 20px rgba(30, 78, 121, 0.3);
            color: var(--accent-gold) !important;
        }

        .btn-guide {
            background: #fff;
            border: 1.5px solid #cbd5e1;
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 8px;
            padding: 5px 12px;
            transition: 0.2s;
        }

        .btn-guide:hover {
            background: #f1f5f9;
            border-color: var(--secondary-blue);
            color: var(--secondary-blue);
        }

        /* MODAL ENHANCEMENT */
        .modal-content {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            padding: 25px;
            border: none;
        }

        .guide-step {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 15px;
            transition: background 0.3s ease;
            border: 1px solid transparent;
        }

        .guide-step:hover {
            background: #f8fafc;
            border-color: #e2e8f0;
        }

        .step-icon {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            background: #e0e7ff;
            color: var(--primary-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.25rem;
        }

        .step-content h6 {
            font-weight: 700;
            margin-bottom: 4px;
            color: var(--text-dark);
        }

        .code-badge {
            background: #1e293b;
            color: #38bdf8;
            padding: 4px 10px;
            border-radius: 6px;
            font-family: 'Monaco', 'Consolas', monospace;
            font-size: 0.85rem;
        }

        .modal-footer-tip {
            background: #fff9db;
            border-radius: 14px;
            padding: 15px;
            font-size: 0.85rem;
            color: #856404;
            border: 1px solid #ffeeba;
        }

        /* FOOTER */
        .footer-custom {
            background: #0f172a;
            color: #94a3b8;
            padding: 40px 0;
            margin-top: 100px;
            font-size: 0.9rem;
        }

        .footer-custom a {
            color: var(--accent-gold);
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .form-card { padding: 30px 20px; margin-top: -40px; }
            .header-section { padding: 60px 20px 80px; }
            .header-section h2 { font-size: 1.5rem; }
        }

        .my-popup-size {
        width: 300px !important;
        padding: 2rem !important;
        font-size: 0.9rem;
        }

    .my-toast {
    width: 280px !important;
    padding: 12px 16px !important;
    border-radius: 12px !important;
    font-size: 0.85rem !important;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

/* Judul */
.my-toast .swal2-title {
    font-size: 14px !important;
    font-weight: 600 !important;
}

/* Icon */
.my-toast .swal2-icon {
    transform: scale(0.8);
}

    </style>
</head>

<body>

    @include('compro.inc.nav')

    <div class="header-section">
        <div class="container">
            <h2>PENDAFTARAN WIFI PEGAWAI</h2>
            <p>Akses Internet mudah untuk seluruh area instansi</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="form-card">
                    <div class="info-box">
                        <i class="fas fa-shield-check"></i>
                        <div>
                            <strong class="d-block">Verifikasi Akun Pegawai</strong> 
                            <span class="small opacity-90">Pastikan data yang anda masukkan sudah benar dan sesuai dengan data kepegawaian.</span>
                        </div>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-user-circle"></i> Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" placeholder="E.g. Budi Setiawan" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-envelope-open-text"></i> Alamat Email</label>
                                <input type="email" class="form-control" name="email" placeholder="nama@instansi.go.id" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-id-badge"></i> NIP (18 Digit)</label>
                                <input type="text" class="form-control" name="nip" id="nip_input" 
                                       placeholder="Contoh: 1990xxxxxxxxxxxx" maxlength="18" required>
                                <div id="nip_feedback" class="small mt-1" style="display: none; font-weight: 500;"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-sitemap"></i> Unit Kerja</label>
                                <select class="form-select" name="unit_kerja" required>
                                    <option value="" disabled selected>Pilih Unit Kerja</option>
                                    <option>Sekretariat Direktorat Jenderal</option>
                                    <option>Dit. Sistem & Strategi</option>
                                    <option>Dit. Pelayanan Tahanan & Anak</option>
                                    <option>Dit. Pembinaan Narapidana</option>
                                    <option>Dit. Pembinaan Kemasyarakatan</option>
                                    <option>Dit. Kesehatan & Rehabilitasi</option>
                                    <option>Dit. Pengamanan & Intelijen</option>
                                    <option>Dit. Kepatuhan Internal</option>
                                    <option>Dit. TI & Kerja Sama</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label"><i class="fas fa-laptop-medical"></i> Jenis Perangkat</label>
                                <select class="form-select" name="jenis_perangkat" required>
                                    <option value="" disabled selected>Pilih Perangkat yang Didaftarkan</option>
                                    <option>Laptop / Notebook</option>
                                    <option>Smartphone (Android/iOS)</option>
                                    <option>Tablet / iPad</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label class="form-label mb-0"><i class="fas fa-microchip"></i> MAC Address Perangkat</label>
                                    <button type="button" class="btn btn-guide btn-sm" data-bs-toggle="modal" data-bs-target="#guideModal">
                                        <i class="fas fa-question-circle"></i> Bantuan
                                    </button>
                                </div>
                                <input type="text" class="form-control" name="mac_address" id="mac_input" 
                                       placeholder="XX:XX:XX:XX:XX:XX" maxlength="17" required>
                                <small class="text-muted mt-1 d-block" style="font-size: 0.75rem;">*Pastikan Bluetooth/Wi-Fi dalam keadaan aktif saat menyalin MAC Address.</small>
                            </div>

                            <div class="col-12 pt-4">
                                <button type="submit" class="btn btn-submit w-100">
                                    <i class="fas fa-paper-plane me-2"></i> Kirim Pengajuan Sekarang
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="guideModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-white">
                        <i class="fas fa-laptop-code me-2"></i> Panduan MAC Address
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4">
                    <div class="guide-step">
                        <div class="step-icon">
                            <i class="fab fa-windows"></i>
                        </div>
                        <div class="step-content">
                            <h6>Laptop Windows</h6>
                            <p class="small text-muted mb-2">Buka <strong>Command Prompt</strong>, ketik perintah berikut:</p>
                            <code class="code-badge">getmac</code>
                            <p class="small text-muted mt-2 mb-0">Atau lihat di <em>Physical Address</em> pada <code>ipconfig /all</code>.</p>
                        </div>
                    </div>

                    <div class="guide-step">
                        <div class="step-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="step-content">
                            <h6>Smartphone (Android/iOS)</h6>
                            <p class="small text-muted mb-0">
                                Buka <strong>Pengaturan</strong> <i class="fas fa-chevron-right mx-1" style="font-size: 0.6rem;"></i> 
                                <strong>Tentang Ponsel</strong> <i class="fas fa-chevron-right mx-1" style="font-size: 0.6rem;"></i> 
                                <strong>Status</strong>
                            </p>
                            <p class="small text-muted mb-0">Salin kode pada bagian <strong>Alamat MAC Wi-Fi</strong>.</p>
                        </div>
                    </div>

                    <div class="modal-footer-tip d-flex align-items-start mt-3">
                        <i class="fas fa-lightbulb me-2 mt-1"></i>
                        <span><strong>Tips:</strong> MAC Address biasanya berupa 12 karakter (kombinasi huruf A-F & angka 0-9).</span>
                    </div>
                </div>

                <div class="modal-footer border-0 pb-4 justify-content-center">
                    <button type="button" class="btn btn-secondary px-5" style="border-radius: 10px; font-weight: 600;" data-bs-dismiss="modal">Saya Mengerti</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-custom text-center">
        <div class="container">
            <!--<p class="mb-2">Sistem Informasi Layanan Teknologi Informasi</p>-->
            <p class="mb-0 opacity-75">© 2026 <strong>Direktorat Jenderal Pemasyarakatan</strong></p>
            <!--<p class="small mt-2">Dikembangkan oleh <a href="#">Tim TI Pemasyarakatan</a></p>-->
        </div>
    </footer>

    @include('compro.inc.js')

    <script>
        // Validasi NIP (18 Digit)
        const nipInput = document.getElementById('nip_input');
        const nipFeedback = document.getElementById('nip_feedback');

        nipInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, ''); 
            const length = this.value.length;
            
            if (length > 0 && length < 18) {
                nipFeedback.style.display = 'block';
                nipFeedback.style.color = '#e11d48'; 
                nipFeedback.innerText = `⚠️ Digit: ${length}/18`;
                this.style.borderColor = '#e11d48';
            } else if (length === 18) {
                nipFeedback.style.color = '#10b981'; 
                nipFeedback.innerHTML = '✅ NIP Lengkap.';
                this.style.borderColor = '#10b981';
            } else {
                nipFeedback.style.display = 'none';
                this.style.borderColor = '#e2e8f0';
            }
        });

        // Auto-format MAC Address (Uppercase & Colon)
        const macInput = document.getElementById('mac_input');
        macInput.addEventListener('input', function() {
            let val = this.value.toUpperCase().replace(/[^0-9A-F]/g, '');
            let parts = val.match(/.{1,2}/g);
            this.value = parts ? parts.join(':').substring(0, 17) : val;
        });
    </script>

    <script>
@if(session('success'))
  @if(session('success'))
Swal.fire({
    toast: true, // 🔥 bikin kecil & seperti notif
    position: 'bottom-end', // kanan bawah
    icon: 'success',
    title: 'Pengajuan berhasil dikirim',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,

    customClass: {
        popup: 'my-toast'
    }
});

@endif
@endif
</script>

</body>
</html>