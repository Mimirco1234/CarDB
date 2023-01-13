@extends('layouts.app')
@section('content')
<div class="mcon">
    <table class="table car">
        <thead><th>Brand</th><th>Model</th><th>Image</th><th></th></thead>
            <tbody>
                <tr>
                    <td>{{ $car->brand }}</td><td>{{ $car->model }}</td>
                    <td><img class="w-25 img-thumbnail"src="{{ asset('images/cars/' . $car->image) }}"></td>
                    <td>
                        <form action="{{route('gadgets.create', $car->id)}}">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                        
                            <select name="nomes" id="nome">
                                @foreach($car->gadgets as $gadget)
                                    <option value='{{$gadget->id}}'>{{$gadget->nome}}</option>
                                @endforeach    
                            </select>   
                                </select>
                            </div>
                        <div class="buttoncontainers">
                            <form action="{{route('cars.edit', $car)}}">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                                <form action="{{route('cars.destroy', $car)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                    </td>  
                                    <tr>
                                        <td>
                                            @foreach ($car->todos as $todo)                     
                                            <div class="card">                        
                                                <div class="card-body">
                                                    <p class="card-text">{{ $todo->user->name }}: </p>                                            
                                                    <p class="card-text">{{ $todo->description }}</p>
                                                    <form action="{{route('todos.destroy', $todo->id)}}" method="POST"> 
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>                                              
                                                 </div>                    
                                            </div>
                                            @endforeach
                                        </td>
                                        <td></td><td></td><td></td>
                                    </tr>
                                        <tr>
                                            <td>
                                                <form action="{{route('todos.store', $car->id)}}" method="POST">
                                                    @csrf
                                                    <label for="description"class="mb-1">Description:</label>   
                                                    <textarea name="description"id="description"class="form-control mb-2"></textarea> 
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </form>
                                            </td>
                                            <td></td><td></td><td></td>
                                        </tr>   
                        </div> 
                </tr>
            </tbody>
    </table>
</div>
@endsection