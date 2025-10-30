<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $totalEmployees = Employee::count();
        $totalDepartments = Department::count();
        $totalPositions = Position::count();

        $todayAttendance = Attendance::whereDate('tanggal', Carbon::today())->count();

        $recentEmployees = Employee::with('position')
            ->orderBy('tanggal_masuk', 'desc')
            ->limit(5)
            ->get();

        $departmentsList = Department::orderBy('nama_departemen', 'asc')->get();

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
