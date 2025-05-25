<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardCtrl extends Controller
{
    function index()
    {
        $data = [];

        $data = DB::table('registrasipasien_t as rp')
            ->join('pasien_m as ps', 'ps.id', 'rp.nocmfk')
            ->select(
                'rp.norec as norec_rp',
                'rp.noregistrasi',
                'rp.tglregistrasi',
                'ps.nama',
                'ps.nocm',
            )->paginate(10);

        return view('home', compact(['data']));
    }
}
