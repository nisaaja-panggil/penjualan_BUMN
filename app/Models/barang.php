<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class barang extends Model
{
    use HasFactory;
    protected $fillable = ['id_penjual', 'name', 'jenis_barang', 'stok', 'harga', 'foto'];



    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'id_barang');
    }
}
