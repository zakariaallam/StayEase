<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $fillable = ['numero','description','image','statut','capacite','hotel_id','categorie_id','tag_id','propriete_id'];
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

}
