@extends('admin.app')
@section('title', '')

@section('content')

<style>
    /* Card Styling */
    .card-custom {
        border-radius: 15px;
        border: none;
        background: #ffffff;
    }

    /* Table Header Styling */
    #myTable thead th {
        background-color: #f8f9fa;
        color: #566a7f;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        font-weight: 600;
        border-top: none;
        padding: 15px;
    }

    /* Table Body Styling */
    #myTable tbody td {
        font-size: 0.9rem;
        color: #697a8d;
        padding: 12px 15px;
        vertical-align: middle;
    }

    /* Custom Badge (Soft UI) */
    .badge-soft-success {
        background-color: #e8fadf;
        color: #71dd37;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 500;
    }

    .badge-soft-warning {
        background-color: #fff2e2;
        color: #ffab00;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 500;
    }

    /* MAC Address & NIP styling */
    .code-text {
        font-family: 'Courier New', Courier, monospace;
        background: #f1f3f5;
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 0.85rem;
        color: #333;
    }

    /* Button Styling */
    .btn-reply {
        background: #696cff;
        border: none;
        border-radius: 8px;
        padding: 6px 16px;
        transition: all 0.3s;
    }

    .btn-reply:hover {
        background: #5f61e6;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(105, 108, 255, 0.3);
    }

    /* DataTables Overrides */
    .dataTables_wrapper .dataTables_filter input {
        border-radius: 8px;
        border: 1px solid #d9dee3;
        padding: 5px 15px;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold"><span class="text-muted fw-light"></span> Daftar Pengajuan Internet</h4>
    </div>

    <div class="card card-custom shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive text-nowrap">
                <table id="myTable" class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Biodata</th>
                            <th>NIP & Unit</th>
                            <th>Perangkat</th>
                            <th>MAC Address</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $index => $contact)
                        <tr>
                            <td class="text-center fw-bold">{{ $index + 1 }}</td>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="fw-semibold text-dark">{{ $contact->name }}</span>
                                    <small class="text-muted">{{ $contact->email }}</small>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="code-text mb-1" style="width: fit-content;">{{ $contact->nip }}</span>
                                    <small>{{ $contact->unit_kerja }}</small>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-label-secondary text-capitalize">{{ $contact->jenis_perangkat }}</span>
                            </td>
                            <td>
                                <code class="text-primary fw-bold">{{ $contact->mac_address }}</code>
                            </td>
                            <td>
                                @if($contact->reply)
                                    <span class="badge-soft-success small">
                                        <i class="bx bx-check-circle me-1"></i>Sudah Dibalas
                                    </span>
                                @else
                                    <span class="badge-soft-warning small">
                                        <i class="bx bx-time-five me-1"></i>Menunggu
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button 
                                    class="btn btn-primary btn-sm btn-reply"
                                    data-bs-toggle="modal"
                                    data-bs-target="#replyModal{{ $contact->id }}">
                                    <i class="bx bx-reply me-1"></i> Balas
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="replyModal{{ $contact->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('contactadmin.reply', $contact->id) }}" method="post">
                                        @csrf
                                        <div class="modal-header border-bottom">
                                            <h5 class="modal-title fw-bold">Kirim Balasan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label text-muted">Tujuan</label>
                                                <input type="text" class="form-control bg-light" value="{{ $contact->name }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-muted">Alamat Email</label>
                                                <input type="text" class="form-control bg-light" value="{{ $contact->email }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Pesan Balasan</label>
                                                <textarea 
                                                    class="form-control" 
                                                    name="reply" 
                                                    rows="5" 
                                                    placeholder="Contoh: Pengajuan Anda telah disetujui. Silakan hubungi IT..." 
                                                    required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary px-4">Kirim Email</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#myTable').DataTable({
        autoWidth: false,
        pageLength: 10,
        dom: '<"p-3 d-flex justify-content-between align-items-center"f>t<"p-3 d-flex justify-content-between"ip>',
        language: {
            search: "",
            searchPlaceholder: "Cari data pengajuan...",
            paginate: {
                previous: "<i class='bx bx-chevron-left'></i>",
                next: "<i class='bx bx-chevron-right'></i>"
            }
        }
    });
});
</script>
@endpush