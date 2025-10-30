@extends('master')
@section('title', 'Detail Pegawai')

@section('content')
    <div class="p-4 mt-14">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                Detail Pegawai
            </h1>

            <div class="flow-root">
                <dl class="-my-3 divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">ID</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $employee->id }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Nama Lengkap</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $employee->nama_lengkap }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Email</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $employee->email }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Nomor Telepon</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $employee->nomor_telepon }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Tanggal Lahir</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $employee->tanggal_lahir }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Alamat</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $employee->alamat }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Tanggal Masuk</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $employee->tanggal_masuk }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Departemen</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">
                            {{ $employee->department->nama_departemen ?? 'N/A' }}</GvG>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Jabatan</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">
                            {{ $employee->position->nama_jabatan ?? 'N/A' }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Status</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $employee->status }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Dibuat Pada</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $employee->created_at }}</dd>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 py-3 sm:gap-4">
                        <dt class="font-medium text-gray-900 dark:text-white">Diupdate Pada</dt>
                        <dd class="text-gray-700 dark:text-gray-300 sm:col-span-2">{{ $employee->updated_at }}</dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6">
                <a href="{{ route('employees.index') }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    &larr; Kembali ke Daftar
                </a>
            </div>

        </div>
    </div>
@endsection