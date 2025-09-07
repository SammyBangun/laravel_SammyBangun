@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Data Pasien</h2>

        <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

        <div class="mb-3">
            <label for="hospitalFilter" class="form-label">Filter Rumah Sakit:</label>
            <select id="hospitalFilter" class="form-select">
                <option value="all">Semua Rumah Sakit</option>
                @foreach ($hospitals as $hospital)
                    <option value="{{ $hospital->id }}">{{ $hospital->nama }}</option>
                @endforeach
            </select>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Rumah Sakit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="patientsTable">
                @foreach ($patients as $patient)
                    <tr id="row-{{ $patient->id }}">
                        <td>{{ $patient->nama }}</td>
                        <td>{{ $patient->alamat }}</td>
                        <td>{{ $patient->no_telpon }}</td>
                        <td>{{ $patient->hospital->nama }}</td>
                        <td>
                            <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm delete-btn-patient"
                                data-id="{{ $patient->id }}">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
