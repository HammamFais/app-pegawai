@extends('master')
@section('title', 'Edit Data Absensi')

@section('content')
    <h1>Form Edit Absensi</h1>

    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT') <table>
            <tr>
                <td><label for="karyawan_id">Karyawan:</label></td>
                <td>
                    <select name="karyawan_id" id="karyawan_id" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" {{ $attendance->karyawan_id == $emp->id ? 'selected' : '' }}> {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="tanggal">Tanggal:</label></td>
                <td><input type="date" id="tanggal" name="tanggal" value="{{ $attendance->tanggal }}" required></td>
            </tr>
            <tr>
                <td><label for="waktu_masuk">Waktu Masuk (HH:MM):</label></td>
                <td><input type="time" id="waktu_masuk" name="waktu_masuk" value="{{ $attendance->waktu_masuk }}"></td>
            </tr>
            <tr>
                <td><label for="waktu_keluar">Waktu Keluar (HH:MM):</label></td>
                <td><input type="time" id="waktu_keluar" name="waktu_keluar" value="{{ $attendance->waktu_keluar }}"></td>
            </tr>
             <tr>
                <td><label for="status_absensi">Status Absensi:</label></td>
                <td>
                    <select id="status_absensi" name="status_absensi" required>
                        <option value="hadir" {{ $attendance->status_absensi == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ $attendance->status_absensi == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ $attendance->status_absensi == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ $attendance->status_absensi == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
@endsection