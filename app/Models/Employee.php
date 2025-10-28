<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
        'departemen_id',
        'jabatan_id'
    ];

    public function department()
    {
        // 'departemen_id' adalah foreign key di tabel employees
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    public function position()
    {
        // 'jabatan_id' adalah foreign key di tabel employees
        return $this->belongsTo(Position::class, 'jabatan_id');
    }

    public function attendances()
    {
        // 'karyawan_id' adalah foreign key di tabel attendance
        return $this->hasMany(Attendance::class, 'karyawan_id');
    }

    public function salaries()
    {
        // 'karyawan_id' adalah foreign key di tabel salaries
        return $this->hasMany(Salary::class, 'karyawan_id');
    }
}
