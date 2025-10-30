@extends('master')

@section('title', 'Tambah Departemen')

@section('content')
    <div class="p-4 mt-14">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                Form Tambah Departemen
            </h1>

            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="grid gap-6">
                    <!-- Nama Departemen -->
                    <div>
                        <label for="nama_departemen"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Departemen</label>
                        <input type="text" id="nama_departemen" name="nama_departemen"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
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