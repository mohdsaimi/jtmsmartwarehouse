<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stoks extends Model
{
    //
    protected $table = 'stoks';
    public $timestamps = false;

    protected $fillable = [
        'fullcode',
        'stok_desc',
        'detail'
    ];

    public function lokasistok()
    {
        return $this->hasMany('App\Models\Lokasistok');
    }
}
