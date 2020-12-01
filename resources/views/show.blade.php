@extends('template.template')
@section('content')
<div class="mb-5 ml-3">
    <img src="{{asset('images/'.$pokemon->image)}}" style="height: 50px;" alt="image"><br>
    <p>Nom : {{$pokemon->nom}}</p>
    <p>Type : {{$pokemon->type->nom}}</p>
    <p>Niveau : {{$pokemon->niveau}}</p>
    <button><a href="/pokemon-edit/{{$pokemon->id}}">edit</a></button>
    <form action="/pokemon-delete/{{$pokemon->id}}" method="POST">
        @csrf
        <button type="submit">delete</button>
    </form>
</div>
@endsection