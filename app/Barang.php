<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = [
        'nama_barang', 'deskripsi', 'kategori_id', 'harga', 'stok', 'gambar'
    ];

    public function kategori() {
        return $this->hasOne('App\Kategori', 'id', 'kategori_id');
    }
}
