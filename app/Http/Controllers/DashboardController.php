<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $idUser = auth()->user()->guru_id;
        $dataMapel = DB::table('kelas')->selectRaw('mapel.id as id, nama_mapel, nama_kelas,mapel_id, hari_pelajaran, jam_pelajaran')
            ->join('mapel',  'kelas.id', '=', 'mapel.kelas_id')
            ->rightJoin('guru', 'mapel.guru_id', '=', 'guru.id')
            ->where('guru_id', $idUser)
            ->get();
        $userdata = DB::table('guru')->where('id', $idUser)->first();

        //recently activities
        $activities = new Collection();

        $today = Carbon::now();
        $yesterday = Carbon::now()->subDay(1);

        $thisYear = Carbon::now()->format('Y');
        $nextYear = Carbon::now()->addYear(1)->format('Y');
        $thisDay = $today->format('Y-m-d');
        // dd($thisYear, $nextYear);

        $kuis = DB::table('kuis')
            ->join('mapel', 'kuis.mapel_id', '=', 'mapel.id')
            ->where('mapel.guru_id', auth()->user()->guru_id)
            ->whereBetween('kuis.created_at', [$yesterday, $today])
            ->get();

        $modul = DB::table('modul')
            ->join('mapel', 'modul.mapel_id', '=', 'mapel.id')
            ->where('mapel.guru_id', auth()->user()->guru_id)
            ->whereBetween('modul.created_at', [$yesterday, $today])
            ->get();

        $task = DB::table('task')
            ->join('mapel', 'task.mapel_id', '=', 'mapel.id')
            ->where('mapel.guru_id', auth()->user()->guru_id)
            ->whereBetween('task.created_at', [$yesterday, $today])
            ->get();

        foreach ($kuis as $b) {
            if ($activities->where('name', $b->nama_kuis)->count() === 0) {
                $activities->push([
                    'name' => $b->nama_kuis,
                    'category' => 'Kuis',
                    'tanggal_regis' => $b->created_at,
                    'status' => 'Dipublikasikan',
                ]);
            }
        }

        foreach ($task as $b) {
            if ($activities->where('name', $b->nama_tugas)->count() === 0) {
                $activities->push([
                    'name' => $b->nama_tugas,
                    'category' => 'Tugas',
                    'tanggal_regis' => $b->created_at,
                    'status' => 'Dipublikasikan',
                ]);
            }
        }

        foreach ($modul as $b) {
            if ($activities->where('name', $b->nama_modul)->count() === 0) {
                $activities->push([
                    'name' => $b->nama_modul,
                    'category' => 'Materi',
                    'tanggal_regis' => $b->created_at,
                    'status' => 'Dipublikasikan',
                ]);
            }
        }

        View::share('activities', $activities);

        // dd($activities);
        return view('pages.dashboard', compact('dataMapel', 'userdata'));
    }
}
