@extends('layouts.app')
@section('content')
<div class="mcon">
@foreach($gadgets as $gadget)
    <div>
        <td>
        <form action="{{ route ('gadgets.destroy', $gadget) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        <td><p>{{$gadget->nome}}</p>
        </form>
    </td>
    </div>
@endforeach
</div>
<div class="mcon">
    <form action="{{ route ('cars.index') }}">
        <button class="btn btn-primary"><---</button>
    </form>
</div>
@endsection