<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocena extends Model
{

    protected $table = "ocene";
    protected $fillable = [

        "predmet",
        "ocena",
        "profesor",

    ];
}
