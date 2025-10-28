@extends('master')
@section('title', 'Detail Gaji')

@section('content')
    <h1>Detail Gaji</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $salary->id }}</td>
        </tr>
         <tr>
            <th>Nama Karyawan</th>
            <td>{{ $salary->employee->nama_lengkap ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Bulan</th>
            <td>{{ $salary->bulan }}</td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>Rp {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Tunjangan</th>
            <td>Rp {{ number_format($salary->tunjangan ?? 0, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Potongan</th>
            <td>Rp {{ number_format($salary->potongan ?? 0, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Gaji</th>
            <td>Rp {{ number_format($salary->total_gaji, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Dicatat Pada</th>
            <td>{{ $salary->created_at }}</td>
        </tr>
         <tr>
            <th>Diupdate Pada</th>
            <td>{{ $salary->updated_at }}</td>
        </tr>
    </table>
    <br>
    <a href="{{ route('salaries.index') }}">Kembali ke Daftar</a>
@endsection