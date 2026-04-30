@extends('admin.app')

@section('title', '')

@section('content')

    <div class="container-fluid py-4">

        {{-- HEADER HALAMAN --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Daftar Pengajuan Internet</h4>
                <p class="text-muted small mb-0">Manajemen permohonan akses jaringan dan registrasi perangkat.</p>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            {{-- BAGIAN TOTAL DATA (DI DALAM CARD HEADER) --}}
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 fw-bold text-primary">Tabel Permohonan</h6>
                <span class="badge rounded-pill bg-primary px-3">
                    Total: {{ $contacts->count() }} Data
                </span>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="myTable" class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th class="ps-3">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>NIP</th>
                                <th>Unit</th>
                                <th>Perangkat</th>
                                <th>MAC Address</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($contacts->isEmpty())
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-5">
                                        <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                        Tidak ada data pengajuan saat ini.
                                    </td>
                                </tr>
                            @else
                                @foreach ($contacts as $index => $contact)
                                    <tr>
                                        <td class="ps-3 text-muted">{{ $index + 1 }}</td>
                                        <td class="fw-semibold">{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->nip ?? '-' }}</td>
                                        <td>{{ $contact->unit_kerja ?? '-' }}</td>
                                        <td>
                                            <span class="text-capitalize small">{{ $contact->jenis_perangkat ?? '-' }}</span>
                                        </td>
                                        <td>
                                            <code
                                                class="text-danger bg-light px-2 py-1 rounded">{{ $contact->mac_address ?? '-' }}</code>
                                        </td>
                                        <td>
                                            @if($contact->reply)
                                                <span class="badge rounded-pill bg-success-subtle text-success border border-success">
                                                    Sudah Dibalas
                                                </span>
                                            @else
                                                <span class="badge rounded-pill bg-warning-subtle text-warning border border-warning">
                                                    Menunggu
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                {{-- Tombol Balas dengan Animasi Hover --}}

                                                <button type="button" class="btn shadow-sm"
                                                    style="background-color: #7367f0; color: white;  width: 42px; height: 42px; display: inline-flex; align-items: center; justify-content: center; border: none; transition: 0.3s;"
                                                    onmouseover="this.style.backgroundColor='#8e85f3'; this.style.transform='translateY(-2px)';"
                                                    onmouseout="this.style.backgroundColor='#7367f0'; this.style.transform='translateY(0px)';"
                                                    data-bs-toggle="modal" data-bs-target="#replyModal{{ $contact->id }}"
                                                    title="Balas Pengajuan">
                                                    <i class="fas fa-paper-plane"></i>
                                                </button>

                                                {{-- Form Hapus dengan Style yang Senada --}}
                                                <form action="{{ route('contactadmin.destroy', $contact->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn shadow-sm"
                                                        style="background-color: #ea5455; color: white; width: 42px; height: 42px; display: inline-flex; align-items: center; justify-content: center; border: none; transition: 0.3s;"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                        onmouseover="this.style.backgroundColor='#f06a6b'; this.style.transform='translateY(-2px)';"
                                                        onmouseout="this.style.backgroundColor='#ea5455'; this.style.transform='translateY(0px)';"
                                                        title="Hapus Data">

                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- MODAL BALAS --}}
                                    <div class="modal fade" id="replyModal{{ $contact->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <form action="{{ route('contactadmin.reply', $contact->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title fw-bold">Kirim Balasan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label text-muted small fw-bold">Kepada</label>
                                                            <div class="p-2 border rounded bg-light">
                                                                <strong>{{ $contact->name }}</strong>
                                                                <span class="text-muted">({{ $contact->email }})</span>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="reply{{ $contact->id }}"
                                                                class="form-label text-muted small fw-bold">Pesan Balasan</label>
                                                            <textarea name="reply" id="reply{{ $contact->id }}" class="form-control"
                                                                rows="4" {{--
                                                                placeholder="Tulis instruksi atau status pengajuan di sini..." --}}
                                                                required>Udah bisa konek coba aja</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer bg-light">
                                                        <button type="button" class="btn btn-secondary border-0"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary px-4">Kirim Email</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- OPSIONAL: FOOTER CARD JIKA ADA PAGINATION --}}
            @if($contacts instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="card-footer bg-white border-0 py-3">
                    {{ $contacts->links() }}
                </div>
            @endif
        </div>
    </div>

@endsection