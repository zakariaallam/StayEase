<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['nom', 'description', 'adresse', 'image', 'is_validate'];
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
