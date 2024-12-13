@extends('templates.main_admin')

@section('title', 'Edit Pasien')

@section('content')
<div class="container">
    <h1>Edit Pasien</h1>
    
    <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pasien->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $pasien->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="no_ktp" class="form-label">No KTP</label>
            <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $pasien->no_ktp }}" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $pasien->no_hp }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    
</div>
@endsection
