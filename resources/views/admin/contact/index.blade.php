@extends('admin.app')
@section('title', 'Daftar Pengajuan')
@section('content')

    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>NIP</th>
                    <th>Unit Kerja</th>
                    <th>Jenis Perangkat</th>
                    <th>Mac Address</th>
                    <th>Balasan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $index => $contact)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->nip }}</td>
                        <td>{{ $contact->unit_kerja }}</td>
                        <td>{{ $contact->jenis_perangkat }}</td>
                        <td>{{ $contact->mac_address }}</td>
                        <td>{{ $contact->reply ?? '-' }}</td>
                        <td>
                            <form action="{{ route('contactadmin.reply', $contact->id) }}" method="post">
                                @csrf
                                <textarea class="form-control" name="reply" cols="30" rows="10" required></textarea>
                                <button class="btn btn-info btn-sm mt-2">Kirim Balasan</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
