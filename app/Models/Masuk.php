<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk'); // foreign key, bukan default
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    protected $fillable = ['id_produk', 'id_supplier', 'tanggal','jumlah'];
    protected $table ="masuks";

}
