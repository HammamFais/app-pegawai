<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the attendances.
     */
    public function index()
    {
        $attendances = Attendance::with('employee')->orderBy('tanggal', 'desc')->paginate(15);

        return view('attendance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new attendance.
     */
    public function create()
    {
        $employees = Employee::orderBy('nama_lengkap')->get();

        return view('attendance.create', compact('employees'));
    }

    /**
     * Store a newly created attendance in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i|after_or_equal:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ], [
            'karyawan_id.required' => 'Pilih karyawan terlebih dahulu.',
            'karyawan_id.exists' => 'Data karyawan tidak ditemukan.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'status_absensi.required' => 'Pilih status absensi.',
            'waktu_keluar.after_or_equal' => 'Waktu keluar harus sama atau setelah waktu masuk.',
        ]);

        // Normalisasi: kalau status bukan 'hadir', kosongkan waktu
        if ($validated['status_absensi'] !== 'hadir') {
            $validated['waktu_masuk'] = null;
            $validated['waktu_keluar'] = null;
        }

        Attendance::create($validated);

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    /**
     * Display the specified attendance.
     */
    public function show(Attendance $attendance)
    {
        $attendance->load('employee');

        return view('attendance.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified attendance.
     */
    public function edit(Attendance $attendance)
    {
        $employees = Employee::orderBy('nama_lengkap')->get();

        return view('attendance.edit', compact('attendance', 'employees'));
    }

    /**
     * Update the specified attendance in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i|after_or_equal:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        if ($validated['status_absensi'] !== 'hadir') {
            $validated['waktu_masuk'] = null;
            $validated['waktu_keluar'] = null;
        }

        $attendance->update($validated);

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil diperbarui.');
    }

    /**
     * Remove the specified attendance from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil dihapus.');
    }
}
