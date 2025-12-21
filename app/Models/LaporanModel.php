<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanModel extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }

    protected $table = 'tb_laporan';

    protected $guarded = [
        'id',
    ];
}
