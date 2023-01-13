@extends('layouts.app')
@section('content')

    <form action = "{{ route ('gadgets.store') }}"method="POST">
        @csrf
        <input typre="text" name="nome" placeholder="Nome">
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

@endsection