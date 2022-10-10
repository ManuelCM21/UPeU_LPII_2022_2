<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    //relacion de 1 a * inversa
    public function team(){
        return $this->belongsTo(Team::class);
    }
}
