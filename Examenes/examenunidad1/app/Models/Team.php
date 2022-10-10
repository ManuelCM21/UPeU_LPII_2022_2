<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    //relacion de 1 a *
    public function players(){
        return $this->hasMany(Player::class);
    }

    //relacion de 1 a * inversa
    public function cycles(){
        return $this->belongsTo(Cycle::class);
    }
}
