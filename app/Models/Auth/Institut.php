<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

use App\Models\Auth\Traits\Method\InstitutMethod;


class Institut extends Model
{
    //
    use InstitutMethod;

    protected $fillable = [
        'nama_institut',
    ];



}


