@extends('master')
@section('title', 'Detail Pegawai')

@section('content')
    <h1>Detail Pegawai</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $employee->id }}</td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $employee->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $employee->email }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $employee->nomor_telepon }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $employee->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $employee->alamat }}</td>
        </tr>
        <tr>
            <th>Tanggal Masuk</th>
            <td>{{ $employee->tanggal_masuk }}</td>
        </tr>
        <tr>
            <th>Departemen</th>
            <td>{{ $employee->department->nama_departemen ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td>{{ $employee->position->nama_jabatan ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $employee->status }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $employee->created_at }}</td>
        </tr>
        <tr>
            <th>Diupdate Pada</th>
            <td>{{ $employee->updated_at }}</td>
        </tr>
    </table>
    <br>
    <a href="{{ route('employees.index') }}">Kembali ke Daftar</a>
@endsection