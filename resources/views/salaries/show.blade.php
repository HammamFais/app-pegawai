@extends('master')
@section('title', 'Detail Gaji')

@section('content')
    <div class="p-4 mt-14">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                Detail Gaji
            </h1>

            <div class="flow-root">
                <dl class="-my-3 divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">ID</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $salary->id }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Nama Karyawan</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">
                            {{ $salary->employee->nama_lengkap ?? 'N/A' }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Bulan</Bulan>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $salary->bulan }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Gaji Pokok</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">Rp
                            {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Tunjangan</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">Rp
                            {{ number_format($salary->tunjangan ?? 0, 2, ',', '.') }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Potongan</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">Rp
                            {{ number_format($salary->potongan ?? 0, 2, ',', '.') }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Total Gaji</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">Rp
                            {{ number_format($salary->total_gaji, 2, ',', '.') }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Dicatat Pada</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $salary->created_at }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Diupdate Pada</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $salary->updated_at }}</dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6">
                <a href="{{ route('salaries.index') }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    &larr; Kembali ke Daftar
                </a>
            </div>

        </div>
    </div>
@endsection