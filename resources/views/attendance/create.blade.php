@extends('master')
@section('title', 'Tambah Data Absensi')

@section('content')
    <div class="p-4 mt-14">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                Form Tambah Absensi
            </h1>

            <form action="{{ route('attendances.store') }}" method="POST">
                @csrf
                <div class_A="grid gap-6">
                    <!-- Karyawan -->
                    <div>
                        <label for="karyawan_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Karyawan</label>
                        <select name="karyawan_id" id="karyawan_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="">Pilih Karyawan</option>
                            @foreach($employees as $emp)
                                <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label for="tanggal"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>

                    <!-- Waktu Masuk -->
                    <div>
                        <label for="waktu_masuk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                            Masuk (HH:MM)</label>
                        <input type="time" id="waktu_masuk" name="waktu_masuk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Waktu Keluar -->
                    <div>
                        <label for="waktu_keluar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                            Keluar (HH:MM)</label>
                        <input type="time" id="waktu_keluar" name="waktu_keluar"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Status Absensi -->
                    <div>
                        <label for="status_absensi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Absensi</label>
                        <select id="status_absensi" name="status_absensi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="hadir">Hadir</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                            <option value="alpha">Alpha</option>
                        </select>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-end mt-4">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection