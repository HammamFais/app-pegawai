@extends('master')
@section('title', 'Daftar Gaji')

@section('content')
    <h1>Daftar Gaji</h1>

     @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
        <br>
    @endif

    <a href="{{ route('salaries.create') }}"
       style="background: blue; color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px;">
        + Tambah Data Gaji
    </a>
    <br><br>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Bulan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($salaries as $salary)
                <tr>
                    <td>{{ $salary->id }}</td>
                    <td>{{ $salary->employee->nama_lengkap ?? 'N/A' }}</td> <td>{{ $salary->bulan }}</td>
                    <td>{{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td> <td>{{ number_format($salary->tunjangan, 2, ',', '.') }}</td>
                    <td>{{ number_format($salary->potongan, 2, ',', '.') }}</td>
                    <td>{{ number_format($salary->total_gaji, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('salaries.show', $salary->id) }}">Detail</a> |
                        <a href="{{ route('salaries.edit', $salary->id) }}">Edit</a> |
                        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                    style="background:red; color:white; border:none; cursor:pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center;">Tidak ada data gaji.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    {{ $salaries->links() }}

@endsection