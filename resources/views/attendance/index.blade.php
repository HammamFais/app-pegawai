@extends('master')
@section('title', 'Daftar Absensi')

@section('content')
    <div class="p-4 mt-14">
        <!-- Header: Judul dan Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
                Daftar Absensi
            </h1>
            <a href="{{ route('attendances.create') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                + Tambah Data Absensi
            </a>
        </div>

        <!-- Notifikasi Sukses -->
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Data -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nama Karyawan</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Waktu Masuk</th>
                        <th scope="col" class="px-6 py-3">Waktu Keluar</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $att)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $att->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $att->employee->nama_lengkap ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $att->tanggal }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $att->waktu_masuk }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $att->waktu_keluar }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $att->status_absensi }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-3">
                                    <a href="{{ route('attendances.show', $att->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                    <a href="{{ route('attendances.edit', $att->id) }}"
                                        class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Edit</a>
                                    <form action="{{ route('attendances.destroy', $att->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                            style="background:none; border:none; padding:0; cursor:pointer;">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                Tidak ada data absensi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $attendances->links() }}
        </div>

    </div>
@endsection