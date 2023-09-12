@extends('layout.master')
@section('page', 'Hasil Kuis')
@section('content')

<div class="col-lg-8 col-md-6 mb-md-0 mb-4">
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="d-flex justify-content-between">
                    <div class="judul">
                        <h4>{{$dataReport->nama_kuis}}</h4>
                        <p>Kelas - <span class="fw-bold text-primary">{{$dataReport->nama_kelas}}</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p class="text-secondary fw-bold fs-6">Hasil perolehan kuis siswa kelas {{$dataReport->nama_kelas}}</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Nis</th>
                        <th>Total Benar</th>
                        <th>Total Salah</th>
                        <th>Skor</th>
                        <th>Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataNilai as $dN)
                    <tr>
                        <td>{{$dN->nama_siswa}}</td>
                        <td>{{$dN->nis}}</td>
                        <td>{{$dN->total_benar}}</td>
                        <td>{{$dN->total_salah}}</td>
                        <td>{{$dN->skor}}</td>
                        <td>{{$dN->ranking}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection