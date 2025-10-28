@extends('master')
@section('title', 'Detail Absensi')

@section('content')
    <h1>Detail Absensi</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $attendance->id }}</td>
        </tr>
         <tr>
            <th>Nama Karyawan</th>
            <td>{{ $attendance->employee->nama_lengkap ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $attendance->tanggal }}</td>
        </tr>
        <tr>
            <th>Waktu Masuk</th>
            <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
        </tr>
        <tr>
            <th>Waktu Keluar</th>
            <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
        </tr>
        <tr>
            <th>Status Absensi</th>
            <td>{{ $attendance->status_absensi }}</td>
        </tr>
        <tr>
            <th>Dicatat Pada</th>
            <td>{{ $attendance->created_at }}</td>
        </tr>
         <tr>
            <th>Diupdate Pada</th>
            <td>{{ $attendance->updated_at }}</td>
        </tr>
    </table>
    <br>
    <a href="{{ route('attendance.index') }}">Kembali ke Daftar</a>
@endsection