<?php

namespace App\Http\Controllers;

use App\Models\HasilPemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HasilPemeriksaanCtrl extends Controller
{
    function periksaPasien(Request $r)
    {
        $data = DB::table('registrasipasien_t as rp')
            ->join('pasien_m as ps', 'ps.id', 'rp.nocmfk')
            ->leftjoin('hasilpemeriksaan_t as hp', 'rp.norec', 'hp.norec_rpfk')
            ->leftJoin('pegawai_m as pg1', 'pg1.id', 'hp.perawatfk')
            ->leftJoin('pegawai_m as pg2', 'pg2.id', 'hp.dokterfk')
            ->select(
                'rp.norec as norec_rp',
                'pg1.namalengkap as perawat',
                'pg2.namalengkap as dokter',
                'ps.nama',
                'ps.tgllahir',
                'ps.jeniskelamin',
                'ps.nohp',
                'ps.nocm',
                'hp.norec',
                'hp.perawatfk',
                'hp.berat_badan',
                'hp.tekanan_darah',
                'hp.dokterfk',
                'hp.keluhan',
                'hp.diagnosa'
            )
            ->where('rp.norec', $r->norec_rp)
            ->first();

        $obat = DB::table('obatpasien_t as op')
            ->join('obat_m as ob', 'ob.id', 'op.obatfk')
            ->select(
                'ob.nama_obat as nama',
                'ob.jenis',
                'op.jumlah',
                'op.aturan_pakai',
            )
            ->where('op.norec_rpfk', $r->norec_rp)
            ->get();

        return redirect()->route('periksa.detail', [
            'norec_rp' => $r->norec_rp,
            'obat' => $obat
        ]);
    }

    function formPeriksaPasien(Request $r)
    {
        $norec_rp = $r->norec_rp;
        $norec = $r->norec;
        return view('perawat-dokter.form-periksa-pasien', compact(['norec_rp', 'norec']));
    }

    function savePeriksaPasien(Request $r)
    {
        $user = auth()->user();
        $norec_rp = $r->norec_rp;
        $norec = $r->norec;

        DB::beginTransaction();
        if (isset($norec)) {
            $hp = HasilPemeriksaan::where('norec', $norec)->first();
        } else {
            $hp = new HasilPemeriksaan();
            $hp->norec = Str::uuid();
        }

        $hp->statusenabled = true;
        $hp->norec_rpfk = $norec_rp;
        if ($user->rolefk == 2) {
            $hp->perawatfk = $user->id;
            $hp->berat_badan = $r->berat_badan;
            $hp->tekanan_darah = $r->tekanan_darah;
        } else if ($user->rolefk == 3) {
            $hp->dokterfk = $user->id;
            $hp->keluhan = $r->keluhan;
            $hp->diagnosa = $r->diagnosa;
        }
        $hp->save();

        DB::commit();

        $data = DB::table('registrasipasien_t as rp')
            ->join('pasien_m as ps', 'ps.id', 'rp.nocmfk')
            ->leftjoin('hasilpemeriksaan_t as hp', 'rp.norec', 'hp.norec_rpfk')
            ->leftJoin('pegawai_m as pg1', 'pg1.id', 'hp.perawatfk')
            ->leftJoin('pegawai_m as pg2', 'pg2.id', 'hp.dokterfk')
            ->select(
                'rp.norec as norec_rp',
                'pg1.namalengkap as perawat',
                'pg2.namalengkap as dokter',
                'ps.nama',
                'ps.tgllahir',
                'ps.jeniskelamin',
                'ps.nohp',
                'ps.nocm',
                'hp.norec',
                'hp.perawatfk',
                'hp.berat_badan',
                'hp.tekanan_darah',
                'hp.dokterfk',
                'hp.keluhan',
                'hp.diagnosa'
            )
            ->where('rp.norec', $r->norec_rp)
            ->first();

        $obat = DB::table('obatpasien_t as op')
            ->join('obat_m as ob', 'ob.id', 'op.obatfk')
            ->select(
                'ob.nama_obat as nama',
                'ob.jenis',
                'op.jumlah',
                'op.aturan_pakai',
            )
            ->where('op.norec_rpfk', $r->norec_rp)
            ->get();

        return redirect()->route('periksa.detail', [
            'norec_rp' => $r->norec_rp,
            'obat' => $obat
        ]);
    }
}
