@extends('layouts.app')
@section('content')
    <form action = "{{ route ('cars.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <input typre="text" name="brand" placeholder="Brand">
        <input typre="text" name="model" placeholder="Model">
        <label for="image"class="mt-3">Image</label>     
        <input type="file"class="form-control"id="image"name="image">
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection