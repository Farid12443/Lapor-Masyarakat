<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    protected $table = 'tb_admin';

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'password',
    ];
}
