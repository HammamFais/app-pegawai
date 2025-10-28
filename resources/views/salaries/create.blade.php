@extends('master')
@section('title', 'Tambah Data Gaji')

@section('content')
    <h1>Form Tambah Gaji</h1>

    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="karyawan_id">Karyawan:</label></td>
                <td>
                    <select name="karyawan_id" id="karyawan_id" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" data-gaji-pokok="{{ $emp->position->gaji_pokok ?? 0 }}">
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="bulan">Bulan (YYYY-MM):</label></td>
                <td><input type="text" id="bulan" name="bulan" placeholder="Contoh: 2025-10" required></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok:</label></td>
                <td><input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok" required readonly></td>
            </tr>
            <tr>
                <td><label for="tunjangan">Tunjangan:</label></td>
                <td><input type="number" step="0.01" id="tunjangan" name="tunjangan" value="0"></td>
            </tr>
            <tr>
                <td><label for="potongan">Potongan:</label></td>
                <td><input type="number" step="0.01" id="potongan" name="potongan" value="0"></td>
            </tr>
            <tr>
                <td><label for="total_gaji">Total Gaji:</label></td>
                <td><input type="number" step="0.01" id="total_gaji" name="total_gaji" required readonly
                        style="background-color: #eee;"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>

    <script>
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
            gajiPokokInput.readOnly = true; // Tetap readonly setelah dipilih
            calculateTotalGaji(); // Hitung ulang total gaji setelah gaji pokok terisi
        });

        // Event listeners saat tunjangan atau potongan berubah
        tunjanganInput.addEventListener('input', calculateTotalGaji);
        potonganInput.addEventListener('input', calculateTotalGaji);

        // Hitung total gaji saat halaman pertama kali load (jika ada nilai awal)
        calculateTotalGaji(); 
    </script>
@endsection