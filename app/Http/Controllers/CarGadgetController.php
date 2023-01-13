<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gadget;
use App\Models\Car;

class CarGadgetController extends Controller
{
    public function store(Request $request, $car_id, $gadget_id) {
        $request->validate([
            'car_id' => 'required',
            'gadget_id' => 'required'
        ]);
        $car = Car::find($request->car_id);
        $car->gadgets()->attach($request->gadget_id);
        return redirect()->route('cars.show')->with('success','Gadget added to car successfully!');  
    }
    public function create($car_id, $gadget_id) {
        $car = Car::find($car_id);
        $gadget = Gadget::find($gadget_id);
        $car->gadgets()->attach($gadget);
        $gadgetController = new GadgetController;
        $gadgetController->store($request, $car_id);

        return redirect()->back()->with('success', 'Gadget associato alla macchina con successo!');
    }
    
    
}
