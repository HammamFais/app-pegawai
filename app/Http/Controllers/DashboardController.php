<?php

namespace App\Http\Controllers;

// Import Model yang kita butuhkan
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Carbon\Carbon; // Untuk mengambil tanggal hari ini

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan data statistik.
     */
    public function index()
    {
        // 1. Ambil data statistik (Total)
        $totalEmployees = Employee::count();
        $totalDepartments = Department::count();
        $totalPositions = Position::count();

        // 2. Ambil data absen hari ini
        // Menggunakan Carbon::today() untuk memastikan kita hanya mengambil data hari ini
        $todayAttendance = Attendance::whereDate('tanggal', Carbon::today())->count();

        // 3. Ambil 5 karyawan terbaru
        // Kita gunakan 'with' untuk eager loading relasi 'position'
        // Ini lebih efisien & dibutuhkan oleh welcome.blade.php
        $recentEmployees = Employee::with('position')
            ->orderBy('tanggal_masuk', 'desc')
            ->limit(5)
            ->get();

        // 4. Ambil daftar departemen
        $departmentsList = Department::orderBy('nama_departemen', 'asc')->get();

        // 5. Kirim semua data ke view 'welcome'
        return view('welcome', [
            'totalEmployees' => $totalEmployees,
            'totalDepartments' => $totalDepartments,
            'totalPositions' => $totalPositions,
            'todayAttendance' => $todayAttendance,
            'recentEmployees' => $recentEmployees,
            'departmentsList' => $departmentsList,
        ]);
    }
}
