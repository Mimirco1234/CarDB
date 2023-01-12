<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['brand', 'model', 'image'];

    public function todos() {  
        return $this->hasMany('App\Models\Todo'); 
    }
    public function gadgets(){  
        return $this->belongsTo('App\Models\Gadget'); 
    }
}
