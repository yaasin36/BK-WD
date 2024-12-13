@extends('templates.main_admin')

@section('title', 'Tambah Pasien')

@section('content')
<div class="container">
    <h1>Tambah Pasien</h1>
    
    <form action="{{ route('admin.pasien.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="no_ktp" class="form-label">No KTP</label>
            <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
@endsection
