<?php

namespace App\Http\Controllers;

use App\Models\ObatPasien;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ObatPasienCtrl extends Controller
{
    function formObatPasien(Request $r)
    {
        $norec_rp = $r->norec_rp;
        $dataObat = Obat::select('id', 'nama_obat', 'jenis')->get();
        return view('apoteker.form-obat-pasien', compact(['norec_rp', 'dataObat']));
    }

    function saveObatPasien(Request $r)
    {
        $norec_rp = $r->norec_rp;
        $norec = $r->norec;

        DB::beginTransaction();
        if (isset($norec)) {
            $op = ObatPasien::where('norec', $norec)->first();
        } else {
            $op = new ObatPasien();
            $op->norec = Str::uuid();
        }

        $op->statusenabled = true;
        $op->norec_rpfk = $norec_rp;
        $op->obatfk = $r->obat_id;
        $op->jumlah = $r->jumlah;
        $op->aturan_pakai = $r->aturan_pakai;
        $op->save();

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
