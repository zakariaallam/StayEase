<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name',' '];

    public function Room()
    {
        return $this->belongsToMany(Room::class,'rooms_properties');
    }
}
