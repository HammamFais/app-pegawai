@extends('master') @section('title', 'Daftar Departemen')
@section('page-title', 'Daftar Departemen') @section('content') <div class="container mt-5">

        <a href="{{ route('departments.create') }}"
            style="background:blue; color:white; padding: 5px 10px; text-decoration:none; border-radius:5px;">
            + Tambah Departemen
        </a>

        <br><br>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Departemen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $dept) <tr>
                        <td>{{ $dept->id }}</td>
                        <td>{{ $dept->nama_departemen }}</td>
                        <td>
                            <a href="{{ route('departments.show', $dept->id) }}">Detail</a> |
                            <a href="{{ route('departments.edit', $dept->id) }}">Edit</a> |

                            <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                    style="background:red; color:white; border:none; cursor:pointer;">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection