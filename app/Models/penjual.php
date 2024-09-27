<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class penjual extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'no_hp', 'alamat'];

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'id_penjual');
    }
}
