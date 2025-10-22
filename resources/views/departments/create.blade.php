@extends('master')

@section('title', 'Tambah Departemen')
@section('page-title', 'Form Tambah Departemen')

@section('content')
    <div class="container mt-5">

        <form action="{{ route('departments.store') }}" method="POST">
            @csrf <table>
                <tr>
                    <td><label for="nama_departemen">Nama Departemen</label></td>
                    <td><input type="text" id="nama_departemen" name="nama_departemen" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:right;">
                        <button type="submit">Simpan</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection