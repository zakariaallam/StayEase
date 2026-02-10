<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function chamber(){
        return $this->hasMany(Chambre::class);
    }
}
