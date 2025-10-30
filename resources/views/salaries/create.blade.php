@extends('master')
@section('title', 'Tambah Data Gaji')

@section('content')
    <div class="p-4 mt-14">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                Form Tambah Gaji
            </h1>

            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf
                <div class="grid gap-6">
                    <!-- Karyawan -->
                    <div>
                        <label for="karyawan_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Karyawan</label>
                        <select name="karyawan_id" id="karyawan_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="">Pilih Karyawan</option>
                            @foreach($employees as $emp)
                                <option value="{{ $emp->id }}" data-gaji-pokok="{{ $emp->position->gaji_pokok ?? 0 }}">
                                    {{ $emp->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Bulan -->
                    <div>
                        <label for="bulan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bulan
                            (YYYY-MM)</label>
                        <input type="text" id="bulan" name="bulan" placeholder="Contoh: 2025-10"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>

                    <!-- Gaji Pokok -->
                    <div>
                        <label for="gaji_pokok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gaji
                            Pokok</label>
                        <input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok"
                            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required readonly>
                    </div>

                    <!-- Tunjangan -->
                    <div>
                        <label for="tunjangan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tunjangan</label>
                        <input type="number" step="0.01" id="tunjangan" name="tunjangan" value="0"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Potongan -->
                    <div>
                        <label for="potongan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Potongan</label>
                        <input type="number" step="0.01" id="potongan" name="potongan" value="0"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Total Gaji -->
                    <div>
                        <label for="total_gaji" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                            Gaji</label>
                        <input type="number" step="0.01" id="total_gaji" name="total_gaji"
                            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required readonly>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Ambil elemen-elemen yang dibutuhkan
            const karyawanSelect = document.getElementById('karyawan_id');
            const gajiPokokInput = document.getElementById('gaji_pokok');
            const tunjanganInput = document.getElementById('tunjangan');
            const potonganInput = document.getElementById('potongan');
            const totalGajiInput = document.getElementById('total_gaji');

            // Fungsi untuk menghitung total gaji
            function calculateTotalGaji() {
                const pokok = parseFloat(gajiPokokInput.value) || 0;
                const tunjangan = parseFloat(tunjanganInput.value) || 0;
                const potongan = parseFloat(potonganInput.value) || 0;
                const total = pokok + tunjangan - potongan;
                totalGajiInput.value = total.toFixed(2); // Format 2 angka desimal
            }

            // Event listener saat karyawan dipilih (untuk auto-fill gaji pokok)
            karyawanSelect.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const gajiPokok = selectedOption.getAttribute('data-gaji-pokok') || 0;
                gajiPokokInput.value = parseFloat(gajiPokok).toFixed(2);
                calculateTotalGaji(); // Hitung ulang total gaji setelah gaji pokok terisi
            });

            // Event listeners saat tunjangan atau potongan berubah
            tunjanganInput.addEventListener('input', calculateTotalGaji);
            potonganInput.addEventListener('input', calculateTotalGaji);

            // Hitung total gaji saat halaman pertama kali load (jika ada nilai awal)
            calculateTotalGaji();
        });
    </script>
@endsection