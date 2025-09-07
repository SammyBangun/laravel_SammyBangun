@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Detail Pasien</h2>

        <a href="{{ route('patients.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">{{ $patient->nama }}</h5>
                <p><strong>Alamat:</strong> {{ $patient->alamat }}</p>
                <p><strong>No Telepon:</strong> {{ $patient->no_telpon ?? '-' }}</p>
                <p><strong>Rumah Sakit:</strong>
                    {{ $patient->hospital ? $patient->hospital->nama : '-' }}
                </p>
            </div>
        </div>
    </div>
@endsection
