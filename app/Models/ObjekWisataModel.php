<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjekWisataModel extends Model
{
    protected $table = 'objek';
    protected $primaryKey = 'id_objek';

    protected $fillable = [
        'nama_objek',
        'deskripsi',
        'harga',
        'gambar',
        'stok',
    ];
}