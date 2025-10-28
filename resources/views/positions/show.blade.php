@extends('master')
@section('title', 'Detail Jabatan')

@section('content')
    <h1>Detail Jabatan</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $position->id }}</td>
        </tr>
         <tr>
            <th>Nama Jabatan</th>
            <td>{{ $position->nama_jabatan }}</td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>Rp {{ number_format($position->gaji_pokok, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $position->created_at }}</td>
        </tr>
         <tr>
            <th>Diupdate Pada</th>
            <td>{{ $position->updated_at }}</td>
        </tr>
    </table>
    <br>
    <a href="{{ route('positions.index') }}">Kembali ke Daftar</a>
@endsection