@extends('master')
@section('title', 'Dashboard')

@section('content')
    <div class="p-4 mt-14">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
            Selamat Datang, Admin!
        </h1>

        <!-- Grid Kartu Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

            <!-- Card 1: Total Karyawan -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5">
                <div class="flex items-center">
                    <div
                        class="flex-shrink-0 p-3 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300">
                        <!-- Icon Pengguna -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Karyawan</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                            {{-- Ganti dengan variabel dari controller, misal: $totalEmployees --}}
                            {{ $totalEmployees ?? '0' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 2: Total Departemen -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5">
                <div class="flex items-center">
                    <div
                        class="flex-shrink-0 p-3 rounded-full bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300">
                        <!-- Icon Gedung -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Departemen</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                            {{ $totalDepartments ?? '0' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 3: Total Jabatan -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5">
                <div class="flex items-center">
                    <div
                        class="flex-shrink-0 p-3 rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300">
                        <!-- Icon Tas Kerja -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Jabatan</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                            {{ $totalPositions ?? '0' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 4: Absen Hari Ini -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5">
                <div class="flex items-center">
                    <div
                        class="flex-shrink-0 p-3 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300">
                        <!-- Icon Ceklis -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Absen Hari Ini</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                            {{ $todayAttendance ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>

        </div> <!-- End Stats Grid -->

        <!-- Grid Konten Utama -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Kolom Kiri: Karyawan Baru -->
            <div class="lg:col-span-2 bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Karyawan Baru Bergabung</h2>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Jabatan</th>
                                <th scope="col" class="px-6 py-3">Tgl. Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop data karyawan baru (Anda harus mengirimkan var $recentEmployees dari controller) -->
                            @isset($recentEmployees)
                                @forelse($recentEmployees as $employee)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $employee->nama_lengkap }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $employee->position->nama_jabatan ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $employee->tanggal_masuk }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center">Belum ada karyawan baru.</td>
                                    </tr>
                                @endforelse
                            @else
                                <!-- Placeholder jika variabel $recentEmployees tidak ada -->
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Ahmad
                                        Dahlan</th>
                                    <td class="px-6 py-4">Software Engineer</td>
                                    <td class="px-6 py-4">2025-10-28</td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Siti
                                        Aisyah</th>
                                    <td class="px-6 py-4">UI/UX Designer</td>
                                    <td class="px-6 py-4">2025-10-25</td>
                                </tr>
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kolom Kanan: Daftar Departemen -->
            <div class="lg:col-span-1 bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Daftar Departemen</h2>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Loop data departemen (Anda harus mengirimkan var $departmentsList dari controller) -->
                    @isset($departmentsList)
                        @forelse($departmentsList as $dept)
                            <li class="py-3">
                                <span class="text-gray-900 dark:text-white">{{ $dept->nama_departemen }}</span>
                            </li>
                        @empty
                            <li class="py-3 text-gray-500 dark:text-gray-400">Belum ada departemen.</li>
                        @endforelse
                    @else
                        <!-- Placeholder jika variabel $departmentsList tidak ada -->
                        <li class="py-3"><span class="text-gray-900 dark:text-white">Teknologi Informasi</span></li>
                        <li class="py-3"><span class="text-gray-900 dark:text-white">Sumber Daya Manusia</span></li>
                        <li class="py-3"><span class="text-gray-900 dark:text-white">Pemasaran</span></li>
                        <li class="py-3"><span class="text-gray-900 dark:text-white">Keuangan</span></li>
                    @endisset
                </ul>
            </div>

        </div> <!-- End Grid Konten Utama -->

    </div>
@endsection