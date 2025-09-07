@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Edit Rumah Sakit</h2>
        <a href="{{ route('hospitals.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <form action="{{ route('hospitals.update', $hospital->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Rumah Sakit</label>
                <input type="text" class="form-control" id="nama" name="nama"
                    value="{{ old('nama', $hospital->nama) }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat"
                    value="{{ old('alamat', $hospital->alamat) }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $hospital->email) }}">
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon"
                    value="{{ old('telepon', $hospital->telepon) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
