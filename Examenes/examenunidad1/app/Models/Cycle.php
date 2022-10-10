<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    //relacion de 1 a *
    public function teams(){
        return $this->hasMany(Team::class);
    }
}
