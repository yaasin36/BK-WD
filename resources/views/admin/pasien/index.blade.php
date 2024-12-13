@extends('templates.main_admin')
@section('title', 'Pasien - Index')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="peers ai-c jc-sb gap-40 mB-5">
                    <div class="peer peer-greed">
                        <h4>Data Pasien</h4>
                    </div>
                    <div class="peer mR-0">
                        <div class="text-end">
                            <a href="{{ route('admin.pasien.create') }}" class="btn btn-primary">Tambah Pasien</a>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No KTP</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($pasien_list->count() > 0)
                            @php $i = 1; @endphp
                            @foreach($pasien_list as $pasien)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $pasien->nama }}</td>
                                <td>{{ $pasien->alamat }}</td>
                                <td>{{ $pasien->no_ktp }}</td>
                                <td>{{ $pasien->no_hp }}</td>
                                <td>
                                    <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('admin.pasien.delete', $pasien->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                                </td>                                
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data pasien.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{ $pasien_list->links() }}
            </div>
        </div>
    </div>
@endsection
