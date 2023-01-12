<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gadget extends Model
{
    use HasFactory;
    protected $fillable =['nome'];
    
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }

    public function cars() {
        return $this->belongstoMany('App\Models\Car');
    }
}
