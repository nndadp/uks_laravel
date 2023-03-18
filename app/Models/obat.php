<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;

    protected $table ="tb_obat";
    protected $fillable = ['id' , 'nama_merk' , 'jenis_obat', 'fungsi_obat', 'stok_obat'];
}
