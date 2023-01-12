<?php

namespace App\Http\Controllers;
use App\Models\Gadget;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GadgetController extends Controller{
    public function index(){
    return view('car.show')->with('gadgets', Gadge::all());
}
}