@extends('templates.main_admin')
@section('title', 'Dokter - Index')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="peers ai-c jc-sb gap-40 mB-5">
                    <div class="peer peer-greed">
                        <h4>Data Dokter</h4>
                    </div>
                    <div class="peer mR-0">
                        <div class="text-end">
                            <a href="{{url('/admin/dokter/create')}}" class="btn cur-p btn-primary btn-color">Tambah Dokter</a>
                        </div>
                    </div>
                </div>
                <table class="table  table-hover">
                    <thead class="table-dark  ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No. HP</th>
                            <th scope="col">Poliklinik</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                       @foreach($dokter_list as $dokter)
                       <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$dokter->nama}}</td>
                        <td>{{$dokter->alamat}}</td>
                        <td>{{$dokter->no_hp}}</td>
                        <td>{{$dokter->poliklinik->nama_poli}}</td>
                        <td>
                            <a href="{{url("/admin/dokter/{$dokter->id}/edit")}}" class="btn cur-p btn-info btn-color">Edit</a>
                            <a href="{{url("/admin/dokter/{$dokter->id}/delete")}}" class="btn cur-p btn-danger btn-color">Delete</a>

                        </td>
                       </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{$dokter_list->links()}}
            </div>
        </div>
    </div>
@endsection
