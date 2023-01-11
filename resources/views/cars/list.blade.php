@extends('layouts.app')
@section('content')
<div class="mcon">
    <table class="table car"> 
        <thead><th>Brand</th><th>Model</th><th>Image</th><th></th></thead>
        <tbody> 
            @foreach ($cars as $car)
            <tr><td>{{ $car -> brand }}</td><td> {{ $car -> model }} </td>
                <td><img class="w-25 img-thumbnail"src="{{ asset('images/cars/' . $car->image) }}"></td>
                <td>
                    <div class="buttoncontainers">
                        <form action="{{route('cars.show', $car)}}">
                            <button type="submit" class="btn btn-primary">Show</button>
                        </form>
                        <form action="{{route('cars.edit', $car)}}">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        <form action="{{route('cars.destroy', $car)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>   
            </tr>
            @endforeach
            <div class="contr">   
                <h2>List of available cars</h2>
                <form action="{{route('cars.create')}}">
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
                </div>
        </tbody>
    </table>
</div>
@endsection