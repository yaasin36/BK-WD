@extends('templates.main_pasien')
@section('title', 'Daftar Poliklinik - Index')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="peers ai-c jc-sb gap-40 mB-5">
                    <div class="peer peer-greed">
                        <h4>Data Poliklinik</h4>
                    </div>
                    <div class="peer mR-0">
                        <div class="text-end">
                        </div>
                    </div>
                </div>
                <table class="table  table-hover">
                    <thead class="table-dark  ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Poliklinik</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                       @foreach($antrian_list as $antrian)
                       <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$antrian->nama_poli}}</td>
                        <td>
                            <a href="{{url("/pasien/antrian/{$antrian->id}/cek-jadwal")}}" class="btn cur-p btn-info btn-color">Cek Jadwal</a>

                        </td>
                       </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{$antrian_list->links()}}
            </div>
        </div>
    </div>
@endsection
