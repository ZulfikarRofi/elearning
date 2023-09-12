<?php

namespace App\Http\Controllers;

use App\Helpers\RestAPIFormatter;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaContoller extends Controller
{
    public function getDataSiswa()
    {
        //declaration variable
        $siswa = DB::table('siswa')
            ->join('kelas', 'siswa.kelas_id', '=', 'kelas.id')
            ->join('periode', 'kelas.periode_id', '=', 'periode.id')
            ->where('siswa.id', 1)
            ->first();

        $dataKelasKu = DB::table('mapel')
            ->join('kelas', 'mapel.kelas_id', '=', 'kelas.id')
            ->join('siswa', 'siswa.kelas_id', '=', 'kelas.id')
            ->join('periode', 'kelas.periode_id', '=', 'periode.id')
            ->where('siswa.id', 1)
            ->get();

        $value = Carbon::now();
        $dataTugasKu = DB::table('kuis')
            ->join('mapel', 'kuis.mapel_id', '=', 'mapel.id')
            ->join('kelas', 'mapel.kelas_id', '=', 'kelas.id')
            ->join('periode', 'kelas.periode_id', '=', 'periode.id')
            ->where('duedate', '<', $value)
            ->get();

        //sending messages
        if ($siswa) {
            if ($dataKelasKu) {
                if ($dataTugasKu) {
                    return RestAPIFormatter::createAPI(200, 'Success', [$siswa, $dataKelasKu, $dataTugasKu]);
                } else {
                    return RestAPIFormatter::createAPI(400, 'Failed');
                }
                return RestAPIFormatter::createAPI(200, 'Not Complete', [$siswa, $dataKelasKu]);
            } else {
                return RestAPIFormatter::createAPI(400, 'Not Complete', $siswa);
            }
        } else {
            return RestAPIFormatter::createAPI(400, 'Failed');
        }
    }

    public function detailMapel()
    {
        //declaration variables
        $dataMapel = DB::table('mapel')
            ->join('guru', 'mapel.guru_id', '=', 'guru.id')
            ->where('mapel.id', 2)
            ->first();

        $getmodul = DB::table('mapel')
            ->join('modul', 'modul.mapel_id', '=', 'mapel.id')
            ->where('mapel.id', 2)
            ->get();

        //sending messages
        if ($getmodul) {
            return RestAPIFormatter::createAPI(200, 'Success', $getmodul);
        } else {
            return RestAPIFormatter::createAPI(400, 'Failed');
        }
    }

    public function daftarTugas()
    {
        $dataTugas = DB::table('kuis')
            ->join('mapel', 'kuis.mapel_id', '=', 'mapel.id')
            ->join('kelas', 'mapel.kelas_id', '=', 'kelas.id')
            ->join('periode', 'kelas.periode_id', '=', 'periode.id')
            ->join('siswa', 'siswa.kelas_id', '=', 'kelas.id')
            ->where('siswa.id', 1)
            ->get();

        if ($dataTugas) {
            return RestAPIFormatter::createAPI(200, 'Success', $dataTugas);
        } else {
            return RestAPIFormatter::createAPI(400, 'Failed');
        }
    }

    public function jadwalku()
    {
        $today = Carbon::parse(Carbon::now());
        $dataMapelHarian = DB::table('mapel')
            ->join('kelas', 'mapel.kelas_id', '=', 'kelas.id')
            ->join('siswa', 'siswa.kelas_id', '=', 'kelas.id')
            ->where('siswa.id', 1)
            ->where('hari_pelajaran', $today->day())
            ->get();

        if ($dataMapelHarian) {
            return RestAPIFormatter::createAPI(200, 'Success', $dataMapelHarian);
        } else {
            return RestAPIFormatter::createAPI(400, 'Failed');
        }
    }

    public function detailMateri()
    {
        $materi = DB::table('mapel')
            ->join('guru', 'mapel.guru_id', '=', 'guru.id')
            ->join('modul', 'modul.mapel_id', '=', 'mapel.id')
            ->where('modul.id', 2)
            ->first();

        if ($materi) {
            return RestAPIFormatter::createAPI(200, 'Success', $materi);
        } else {
            return RestAPIFormatter::createAPI(400, 'Failed');
        }
    }

    public function daftarSiswa()
    {
        $dataSiswa = DB::table('kelas')
            ->join('periode', 'kelas.periode_id', '=', 'periode.id')
            ->join('siswa', 'siswa.kelas_id', '=', 'kelas.id')
            ->where('kelas.id', 2)
            ->get();

        if ($dataSiswa) {
            return RestAPIFormatter::createAPI(200, 'Success', $dataSiswa);
        } else {
            return RestAPIFormatter::createAPI(400, 'Failed');
        }
    }
}
