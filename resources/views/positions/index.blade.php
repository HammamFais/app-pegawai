@extends('master')
@section('title', 'Daftar Jabatan')

@section('content')
    <h1>Daftar Jabatan</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
        <br>
    @endif

    <a href="{{ route('positions.create') }}"
       style="background: blue; color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px;">
        + Tambah Jabatan Baru
    </a>
    <br><br>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($positions as $pos)
                <tr>
                    <td>{{ $pos->id }}</td>
                    <td>{{ $pos->nama_jabatan }}</td>
                    <td>Rp {{ number_format($pos->gaji_pokok, 2, ',', '.') }}</td> <td>
                        <a href="{{ route('positions.show', $pos->id) }}">Detail</a> |
                        <a href="{{ route('positions.edit', $pos->id) }}">Edit</a> |
                        <form action="{{ route('positions.destroy', $pos->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                    style="background:red; color:white; border:none; cursor:pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Tidak ada data jabatan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    {{ $positions->links() }} @endsection