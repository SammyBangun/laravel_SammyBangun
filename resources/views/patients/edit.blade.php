@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Edit Data Pasien</h2>

        <form action="{{ route('patients.update', $patient->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pasien</label>
                <input type="text" name="nama" id="nama" class="form-control"
                    value="{{ old('nama', $patient->nama) }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat', $patient->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="no_telpon" class="form-label">No Telepon</label>
                <input type="text" name="no_telpon" id="no_telpon" class="form-control"
                    value="{{ old('no_telpon', $patient->no_telpon) }}">
            </div>

            <div class="mb-3">
                <label for="id_rumah_sakit" class="form-label">Rumah Sakit</label>
                <select name="id_rumah_sakit" id="id_rumah_sakit" class="form-select" required>
                    <option value="">-- Pilih Rumah Sakit --</option>
                    @foreach ($hospitals as $hospital)
                        <option value="{{ $hospital->id }}"
                            {{ $patient->id_rumah_sakit == $hospital->id ? 'selected' : '' }}>
                            {{ $hospital->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
