<?php

namespace App\Http\Controllers;

use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Pasien;
use App\Models\RegistrasiPasien;

class RegistrasiCtrl extends Controller
{
    function pasienBaru()
    {
        return view('pendaftaran.pasien-baru');
    }

    function pasienLama()
    {
        $data = Pasien::paginate(10);
        return view('pendaftaran.pasien-lama', compact(['data']));
    }

    function savePasien(Request $r)
    {
        $nocm_generate = Faker::create()->unique()->numerify('########');
        Pasien::create([
            'nama' => $r->nama,
            'nocm' => $nocm_generate,
            'tgllahir' => $r->tgllahir,
            'jeniskelamin' => $r->jeniskelamin,
            'nohp' => $r->nohp
        ]);

        return redirect('/dashboard');
    }

    function regisPasien(Request $r)
    {
        $pasien = json_decode($r->input('pasien'), true);
        $datePrefix = date('ymd');
        $todayCount = RegistrasiPasien::whereDate('created_at', Carbon::today())->count() + 1;
        $noUrut = str_pad($todayCount, 3, '0', STR_PAD_LEFT);
        $noregistrasi = $datePrefix . $noUrut;
        RegistrasiPasien::create([
            'norec' => Str::uuid(),
            'statusenabled' => true,
            'noregistrasi' => $noregistrasi,
            'tglregistrasi' => Carbon::today(),
            'nocmfk' => $pasien['id'],
        ]);

        return redirect('/dashboard');
    }
}
