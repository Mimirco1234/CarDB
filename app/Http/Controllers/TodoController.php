<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use App\Models\Car;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function create() {              
        return view('todos.create');      
    }
    public function store(Request $request, $car_id) {
        $request->validate([
            'description' => 'required'
        ]);      
        $todo = new Todo;
        $todo->description = $request->description;
        $todo->car_id = $car_id;
        $todo->user_id = Auth::user()->id;
        $todo->save();      
        return redirect()->route('cars.show', $car_id)->with('success','TODO created successfully!');  
    }
    public function index() {     
        return view('todos.list')->with('todos', Todo::all()); 
    }
    public function edit(Todo $todo)
    {
        return view('cars.edit')->with('todo', $todo);
    }
    public function destroy($todo_id)
    {
        $todo = Todo::Find($todo_id);
        $todo->delete();
        return redirect()->route('cars.show', $todo->car_id)
        ->with('success', 'comment deleted successfully.');
    }
    public function update(Request $request, Todo $todo){

        $request -> validate([
            'description' => 'required',
            'car_id' => 'required',
            'user_id' => 'required'
        ]);

        return redirect('/cars')
        ->with('success', 'Todo updated successfully');
    }
}
