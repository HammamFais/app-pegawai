@extends('master')

@section('title', 'Edit Departemen')
@section('page-title', 'Form Edit Departemen')

@section('content')
    <div class="container mt-5">

        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf @method('PUT') <table>
                <tr>
                    <td><label for="nama_departemen">Nama Departemen</label></td>
                    <td><input type="text" id="nama_departemen" name="nama_departemen"
                            value="{{ $department->nama_departemen }}" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:right;">
                        <button type="submit">Update</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection