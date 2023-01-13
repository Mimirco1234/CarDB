<?php

namespace App\Http\Controllers;
use App\Models\Gadget;
use App\Models\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GadgetController extends Controller{
    
    public function index() {

        $gadgets = Gadget::all();
        return view('gadgets.index', compact('gadgets'));
    }
    
    public function store(Request $request) {
        
        $gadget = new Gadget();
        $request -> validate([
            'nome' => 'required',
        ]);

        $gadget->nome = $request->nome;
        $gadget->save();
        
        return redirect()->route('gadgets.index')->with('success','Gadget created successfully!');  
    }

    
    public function create(Gadget $gadget)
    {
        return view('gadgets.create', $gadget);
    }
    public function show(Gadget $gadget)
    {
        return view('gadgets.show')->with('gadget', $gadget);
    }
    public function destroy(Gadget $gadget)
    {
        $gadget->delete();
        return redirect()->route('gadgets.index')
        ->with('success', 'Car deleted successfully.');
    }
}