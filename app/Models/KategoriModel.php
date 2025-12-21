<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{

    public function laporan()
    {
        return $this->hasMany(LaporanModel::class, 'kategori_id');
    }

    protected $table = 'tb_kategori';

    protected $guarded = [
        'id',
    ];
}
