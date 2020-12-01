@extends('template.template')
@section('content')
<h3>Creation du type de pokemons</h3>
<div class="container">
    <form action="/add-type" method="post">
    @csrf
    <input type="text" name="nom" placeholder="Nom du type" value="{{old('nom')}}">
    <button type="submit">Add</button>
</form>
</div>

@endsection