<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    //
    protected $table="devices";

    public $timestamps=false;

    protected $fillable = [
        'kod_IOT',
        'bil_petak',
        'institut_id'
    ];

    public function institut()
    {
        return $this->belongsTo('App\Models\Institut');
    }
}
