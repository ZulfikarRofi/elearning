@extends('layout.master')
@section('page', 'Halaman Mata Pelajaran')
@section('content')

<div class="col-lg-8 col-md-6 mb-md-0 mb-4">
    @foreach($dataMapel as $mp)
    <div class="card">
        <div class="card-header px-3 d-flex justify-content-between">
            <div class="detail-title">
                <h5 class="card-title">Mata Pelajaran - {{$mp->nama_mapel}}</h5>
                <p class="text-secondary text-md font-weight-bold">Kelas - <span class="font-weight-bold text-primary">{{$mp->nama_kelas}}</span></p>
            </div>
            <div class="text-end">
                <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <li><a class="dropdown-item border-radius-md" href="/addmodul/{{$mp->id}}">Tambah Modul Baru</a></li>
                        <li><a class="dropdown-item border-radius-md" href="/addtask/{{$mp->id}}">Tambah Tugas Baru</a></li>
                        <li><a class="dropdown-item border-radius-md" href="/addquiz/{{$mp->id}}">Tambah Kuis Baru</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <p class="text-sm text-secondary text-md text-justify">{{$mp->deskripsi}}</p>
            </div>
            <div class="row">
                <div class="col-6">
                    <h6 class="text-secondary text-md font-weight-bold">Informasi Lebih :</h6>
                    <ul class="m-0 p-0">
                        <li class="m-0 p-0 text-sm" style="list-style:none;">Guru Pengampu : <span class="font-weight-bold text-primary text-capitalize">
                                @if($mp->jenis_kelamin == 'perempuan')
                                Bu
                                @else
                                Bapak
                                @endif
                                {{$mp->nama_guru}}
                            </span></li>
                        <li class="m-0 p-0 text-sm" style="list-style:none;">Jumlah Modul : <span class="font-weight-bold text-primary">{{$totalModul}} Modul</span></li>
                        <li class="m-0 p-0 text-sm" style="list-style:none;">Total Kuis : <span class="font-weight-bold text-primary">{{$totalKuis}} Kuis</span></li>
                        <li class="m-0 p-0 text-sm" style="list-style:none;">Total Tugas : <span class="font-weight-bold text-primary">{{$totalTask}} Tugas</span></li>
                    </ul>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="text-secondary text-md font-weight-bold">Daftar Modul</h6>
                            <ul class="m-0 p-0">
                                @php($a = 1)
                                @foreach($modul as $m)
                                <li class="m-0 p-0 text-sm" style="list-style:none;">Modul {{$a++}} : <span class="font-weight-bold text-justify text-capitalize text-primary"><a href="/detail/modul/{{$m->id}}">{{$m->nama_modul}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-6">
                            <h6 class="text-secondary text-md font-weight-bold">Daftar Kuis</h6>
                            <ul class="m-0 p-0">
                                @php($a = 1)
                                @foreach($kuis as $k)
                                <li class="m-0 p-0 text-sm" style="list-style:none;">Kuis {{$a++}} : <span class="font-weight-bold text-primary"><a href="/detail/kuis/{{$k->id}}">{{$k->nama_kuis}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection
