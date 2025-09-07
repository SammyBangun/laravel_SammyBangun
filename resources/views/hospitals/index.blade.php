@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Data Rumah Sakit</h2>
        <a href="{{ route('hospitals.create') }}" class="btn btn-primary mb-3">Tambah Rumah Sakit</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitals as $hospital)
                    <tr id="row-{{ $hospital->id }}">
                        <td>{{ $hospital->id }}</td>
                        <td>{{ $hospital->nama }}</td>
                        <td>{{ $hospital->alamat }}</td>
                        <td>{{ $hospital->email }}</td>
                        <td>{{ $hospital->telepon }}</td>
                        <td>
                            <a href="{{ route('hospitals.show', $hospital->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('hospitals.edit', $hospital->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $hospital->id }}">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
