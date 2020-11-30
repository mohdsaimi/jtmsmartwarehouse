<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institut extends Model
{
    //
    protected $table="instituts";

    public $timestamps=false;

    public function user()
    {
        return $this->hasMany('App\Models\Auth\User');
    }

    public function device()
    {
        return $this->hasMany('App\Models\Devices');
    }
}
