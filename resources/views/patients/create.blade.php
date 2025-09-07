@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Tambah Pasien</h2>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="no_telpon" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="{{ old('no_telpon') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="id_rumah_sakit" class="form-label">Rumah Sakit</label>
                <select id="id_rumah_sakit" name="id_rumah_sakit" class="form-select" required>
                    <option value="">-- Pilih Rumah Sakit --</option>
                    @foreach ($hospitals as $hospital)
                        <option value="{{ $hospital->id }}" {{ old('id_rumah_sakit') == $hospital->id ? 'selected' : '' }}>
                            {{ $hospital->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
