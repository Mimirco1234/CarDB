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
@endsection