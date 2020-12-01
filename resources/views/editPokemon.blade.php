@extends('template.template')
@section('content')
<div class="container">
    <form action="/update-pokemon/{{$pokemon->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <img src="{{asset('images/'.$pokemon->image)}}" style="height: 50px;" alt="image"><br>
    <input type="text" name="nom" value="{{$pokemon->nom}}">
    <select name="type_id">
        <option value="{{$pokemon->type->id}}">{{$pokemon->type->nom}}</option>
            @foreach($types as $type)
            <option value="{{$type->id}}">{{$type->nom}}</option>
            @endforeach
        </select>
    <input type="file" name="image" value="{{$pokemon->image}}">
    <input type="number" name="niveau" value="{{$pokemon->niveau}}">

    <button type="submit">Add</button>
    </form>
</div>
@endsection