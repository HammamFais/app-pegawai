@extends('master')
@section('title', 'Detail Jabatan')

@section('content')
    <div class="p-4 mt-14">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                Detail Jabatan
            </h1>

            <div class="flow-root">
                <dl class="-my-3 divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">ID</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $position->id }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Nama Jabatan</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $position->nama_jabatan }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Gaji Pokok</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">Rp
                            {{ number_format($position->gaji_pokok, 2, ',', '.') }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Dibuat Pada</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $position->created_at }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Diupdate Pada</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $position->updated_at }}</dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6">
                <a href="{{ route('positions.index') }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    &larr; Kembali ke Daftar
                </a>
            </div>

        </div>
    </div>
@endsection