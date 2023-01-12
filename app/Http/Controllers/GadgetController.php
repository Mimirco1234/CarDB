<?php

namespace App\Http\Controllers;
use App\Models\Gadget;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GadgetController extends Controller{
    public function index(){
    return view('car.show')->with('gadgets', Gadge::all());
}
public function store(Request $request) {
    $request->validate([
        'nome' => 'required'
    ]);      
    $gadget = new Gadget;
    $gadget->nome = $request->nome;
    $gadget->save();      
    return redirect()->route('cars.show')->with('success','TODO created successfully!');  
}
}