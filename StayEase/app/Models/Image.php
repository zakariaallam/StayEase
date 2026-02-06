<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
        protected $fillable = ['titre','image_path','hotel_id'];

        public function hotels(){
            return $this->belongsTo(Hotel::class,'hotel_id');
        }
}
