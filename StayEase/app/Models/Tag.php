<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
<<<<<<< HEAD
    //
=======
    protected $fillable = ['name', 'slug'];
    public function Room()
    {
        return $this->belongsToMany(Room::class, 'rooms_tags');
    }
>>>>>>> 4bf11cc0dce6c5f82c6215d1f01651307b497497
}
