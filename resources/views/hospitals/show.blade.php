@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Detail Rumah Sakit</h2>
        <a href="{{ route('hospitals.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">{{ $hospital->nama }}</h5>
                <p><strong>Alamat:</strong> {{ $hospital->alamat }}</p>
                <p><strong>Email:</strong> {{ $hospital->email ?? '-' }}</p>
                <p><strong>Telepon:</strong> {{ $hospital->telepon ?? '-' }}</p>
            </div>
        </div>
    </div>
@endsection
