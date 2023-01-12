<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['description','car_id', 'user_id'];

public function user(){  
    return $this->belongsTo('App\Models\User'); 
}
public function cars(){  
    return $this->belongsTo('App\Models\Car'); 
}
}