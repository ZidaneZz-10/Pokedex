@extends('template.template')
@section('content')
@foreach($pokemons as $pokemon)
<div class="mb-5 ml-3">
    <p>{{$pokemon->nom}}</p>
    <img src="{{asset('images/'.$pokemon->image)}}" style="height: 50px;" alt="image">
    <button><a href="/pokemon/{{$pokemon->id}}">plus d'infos</a></button>
</div>

@endforeach
@endsection