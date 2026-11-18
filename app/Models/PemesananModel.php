<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananModel extends Model
{
    //
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'id_pengguna',
        'id_objek',
        'nama_pemesan',
        'jumlah',
        'tanggal_tiket',
        'jumlah_harga',
    ];

    public function pengguna()
    {
        return $this->belongsTo(PenggunaModel::class, 'id_pengguna');
    }
    public function objek()
    {
        return $this->belongsTo(ObjekWisataModel::class, 'id_objek');
    }
}