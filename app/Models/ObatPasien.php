<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatPasien extends Model
{
    use HasFactory;
    protected $table = 'obatpasien_t';
    protected $primaryKey = 'norec';
    protected $fillable = [
        'norec',
        'statusenabled',
        'norec_rpfk',
        'obatfk',
        'jumlah',
        'aturan_pakai'
    ];
}
