@extends('master')
@section('title', 'Daftar Absensi')

@section('content')
    <h1>Daftar Absensi</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
        <br>
    @endif

    <a href="{{ route('attendance.create') }}"
       style="background: blue; color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px;">
        + Tambah Data Absensi
    </a>
    <br><br>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($attendances as $att)
                <tr>
                    <td>{{ $att->id }}</td>
                    <td>{{ $att->employee->nama_lengkap ?? 'N/A' }}</td> <td>{{ $att->tanggal }}</td>
                    <td>{{ $att->waktu_masuk }}</td>
                    <td>{{ $att->waktu_keluar }}</td>
                    <td>{{ $att->status_absensi }}</td>
                    <td>
                        <a href="{{ route('attendance.show', $att->id) }}">Detail</a> |
                        <a href="{{ route('attendance.edit', $att->id) }}">Edit</a> |
                        <form action="{{ route('attendance.destroy', $att->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                    style="background:red; color:white; border:none; cursor:pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data absensi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    {{ $attendances->links() }}

@endsection