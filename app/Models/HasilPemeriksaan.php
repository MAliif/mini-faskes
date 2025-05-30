<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPemeriksaan extends Model
{
    use HasFactory;
    protected $table = 'hasilpemeriksaan_t';
    protected $primaryKey = 'norec';
    protected $fillable = [
        'norec',
        'statusenabled',
        'norec_rpfk',
        'perawatfk',
        'berat_badan',
        'tekanan_darah',
        'dokterfk',
        'keluhan',
        'diagnosa'
    ];
}
