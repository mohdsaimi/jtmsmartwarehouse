<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasistoks extends Model
{
    //
    protected $table="lokasi_stoks";

    public $timestamps=false;

    protected $fillable = [
        'institut_id',
        'stok_id',
        'device_id',
        'petak'
    ];

    public function stok()
    {
        return $this->belongsTo('App\Models\Stoks');
    }

    public function institut()
    {
        return $this->belongsTo('App\Models\Institut');
    }

    public function device()
    {
        return $this->belongsTo('App\Models\Devices');
    }
}
