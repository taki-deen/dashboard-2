<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded=['id'];

    public function main_image(){
        return $this->morphOne('Image','imageable','')->where('is_main',true)->first();
    }

    public function images(){
        return $this->morphMany('Image','imageable','')->where('is_main',false)->first();
    }

}
