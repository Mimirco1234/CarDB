@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            @foreach (Auth::user()->todos as $todo)
                <div class="card">                         
                    <div class="card-body">                               
                        <p class="card-text">{{ $todo->description }}</p>             
                    </div>                     
                </div>                 
            @endforeach
        </div>
    </div>
</div>
@endsection
