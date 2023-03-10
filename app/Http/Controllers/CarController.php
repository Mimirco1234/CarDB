<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gadget;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.list')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car();
        $request -> validate([
            'brand' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048', 
            'model' => 'required'
        ]);
        if($request->image) {         
            $name = uniqid().'.'.$request->image->extension();           
            $request->image->move(public_path('images/cars'), $name);         
            $car->image = $name;
        }
        $car->brand = $request->brand;     
        $car->model = $request->model;
        $car->save();
        return redirect()->route('cars.index')
        ->with('success', 'Car created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $gadgets = $car->gadgets;
        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request -> validate([
            'brand' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048', 
            'model' => 'required'
        ]);
        if($request->image) {         
            $name = uniqid().'.'.$request->image->extension();           
            $request->image->move(public_path('images/cars'), $name);         
            $car->image = $name;
        }
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car -> save();
        return redirect('/cars')
        ->with('success', 'Car updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')
        ->with('success', 'Car deleted successfully.');
    }
    public function __construct() {
        $this->middleware('auth');
    }
}
