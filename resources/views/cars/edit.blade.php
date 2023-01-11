@extends('layouts.app')
@section('content')
    <form action="{{route ('cars.update', $car)}}" enctype="multipart/form-data" method="POST">
    @method('PUT') @csrf
<input type="text" name="brand" value="{{$car->brand}}">
<input type="text" name="model" value="{{$car->model}}">
<label for="image"class="mt-3">Image</label>     
<input type="file"class="form-control"id="image"name="image">
<button class="btn-primary"type="submit" width="73px" margin="3px">Submit</button>
</form>
<form action="{{ route('todos.store') }}"method="POST">   
    @csrf   
    <label for="title"class="mb-1">Title:</label>
    <input type="text"name="title"id="title"class="form-control mb-2">   
    <label for="description"class="mb-1">Description:</label>   
    <textarea name="description"id="description"class="form-control mb-2"></textarea> 
    <button type="submit"class="btn btn-primary">Submit</button>
</form>
@endsection