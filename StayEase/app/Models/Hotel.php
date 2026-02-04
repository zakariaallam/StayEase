<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['nom','adresse','description'];

    public function chambres(){
        return $this->hasMany(Chambre::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
