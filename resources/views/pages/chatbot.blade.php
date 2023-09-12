@extends('layout.masteradmin')
@section('page', 'Chatbot')
@section('content')

<div class="row mb-3 mx-1">
    <div class="card">
        <div class="card-header pb-0">
            <div class="col-lg-6 col-7">
                <h6>Tambahkan Bot Baru</h6>
                <p class="text-sm mb-0">
                    membuat bot materi untuk diakses siswa dengan mata pelajaran terkait
                </p>
            </div>
        </div>
        <div class="card-body">
            <form role="form">
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Nama Bot</label>
                    <input type="text" class="form-control">
                </div>
                <div class="input-group input-group-outline mb-3">
                    <select class="form-select form-select-lg" aria-label=".form-select-lg example">
                        <option selected>Pilih Mata Pelajaran</option>
                        <option value="1">Matematika</option>
                        <option value="2">Ilmu Pengetahuan Alam</option>
                        <option value="3">Ilmu Pengetahuan Sosial</option>
                    </select>
                </div>
                <label for="" class="fw-bold">Kelas Target</label>
                <div class="input-group input-group-outline mb-3">
                    <div class="selection-box p-2">
                        <ul class="d-flex m-0 p-0">
                            <li class="m-1 d-flex align-items-center"><span class="fw-bold">Kelas IX-A</span><i class="material-icons opacity-10" style="font-size: 12px">close</i></li>
                            <li class="m-1 d-flex align-items-center"><span class="fw-bold">Kelas IX-B</span><i class="material-icons opacity-10" style="font-size: 12px">close</i></li>
                            <li class="m-1 d-flex align-items-center"><span class="fw-bold">Kelas IX-C</span><i class="material-icons opacity-10" style="font-size: 12px">close</i></li>
                            <li class="m-1 d-flex align-items-center"><span class="fw-bold">Kelas IX-D</span><i class="material-icons opacity-10" style="font-size: 12px">close</i></li>
                            <input type="text" id="addSelect">
                        </ul>
                    </div>
                </div>
                <button class="btn btn-primary">Remove All</button>
            </form>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">smart_toy</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Bot Biologi</p>
                    <h4 class="mb-0">100 Data</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><i class="fa fa-clock me-1"></i>Last update: 1 month ago</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">smart_toy</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Bot Matematika</p>
                    <h4 class="mb-0">154 Data</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><i class="fa fa-clock me-1"></i>Last update: 3 months ago</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">smart_toy</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Bot Fisika</p>
                    <h4 class="mb-0">99 Data</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><i class="fa fa-clock me-1"></i>Last update: 1 month ago</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">smart_toy</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Bot IPS</p>
                    <h4 class="mb-0">103 Data</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><i class="fa fa-clock me-1"></i>Last update: 2 months ago</p>
            </div>
        </div>
    </div>
</div>


@endsection