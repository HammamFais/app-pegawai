@extends('master')
@section('title', 'Edit Data Pegawai')

@section('content')
    <h2>Edit Data Pegawai</h2>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                        required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="{{ old('email', $employee->email) }}" required></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                        required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                        required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" required>{{ old('alamat', $employee->alamat) }}</textarea></td>
            </tr>
            <tr>
                <td>Tanggal Masuk</td>
                <td><input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                        required></td>
            </tr>

            <tr>
                <td><label for="departemen_id">Departemen:</label></td>
                <td>
                    <select name="departemen_id" id="departemen_id" required>
                        <option value="">Pilih Departemen</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}" {{ $employee->departemen_id == $dept->id ? 'selected' : '' }}>
                                {{ $dept->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="jabatan_id">Jabatan (Position):</label></td>
                <td>
                    <select name="jabatan_id" id="jabatan_id" required>
                        <option value="">Pilih Jabatan</option>
                        @foreach($positions as $pos)
                            <option value="{{ $pos->id }}" {{ $employee->jabatan_id == $pos->id ? 'selected' : '' }}>
                                {{ $pos->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif
                        </option>
                        <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>
                            Nonaktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
@endsection