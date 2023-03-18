<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table ="tb_kunjungan";
    protected $fillable = ['nis' ,'tgl_kunjungan','keperluan','nama_obat', 'jumlah_obat'];
}
