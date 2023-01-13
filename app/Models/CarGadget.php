<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarGadget extends Model
{
    use HasFactory;
    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }

    public function gadgets()
    {
        return $this->belongsToMany(Gadget::class);
    }
}
