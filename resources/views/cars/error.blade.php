@if ($error->any())
<div class="alert alert-danger mt-0">
    @foreach($error->all() as $error) <p> {{$error}}</p>
        @endforeach
</div>
@endif