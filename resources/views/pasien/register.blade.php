@extends('templates.auth')
@section('title', 'Register Pasien')
@section('content')
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv"
            style='background-image: url("{{ url('assets/static/images/bg.jpg') }}")'>
            <div class="pos-a centerXY">
                <div class="bgc-white bdrs-50p pos-r" style="width: 120px; height: 120px;">
                    <img class="pos-a centerXY" src="{{ url('assets/static/images/logo.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width: 320px;">
            <h4 class="fw-300 c-grey-900 mB-40">Login Pasien</h4>
            <form action="{{ route('pasien.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat:</label>
                    <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="no_ktp">Nomor KTP:</label>
                    <input type="text" id="no_ktp" name="no_ktp" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp">Nomor HP:</label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            


        </div>
    </div>
@endsection
