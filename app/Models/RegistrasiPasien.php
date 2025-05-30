<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiPasien extends Model
{
    use HasFactory;
    protected $table = 'registrasipasien_t';
    protected $primaryKey = 'norec';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'norec',
        'statusenabled',
        'noregistrasi',
        'tglregistrasi',
        'nocmfk',
    ];
}
