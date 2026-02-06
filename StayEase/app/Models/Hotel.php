<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
<<<<<<< HEAD
    protected $fillable = ['nom','adresse','description','image'];

    public function chambres(){
        return $this->hasMany(Chambre::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
=======
    protected $fillable = ['nom','description','adresse0','image'];
>>>>>>> 4bf11cc0dce6c5f82c6215d1f01651307b497497
}
