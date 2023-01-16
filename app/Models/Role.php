<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['Admin', 'User', 'user_id'];

    public function users(){
        return $this->hasMany('App\Models\User');
    }
    public function permissions(){
        return $this->belongtoMany('App\Models\Permission');
    }
}
