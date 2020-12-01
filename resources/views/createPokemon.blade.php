@extends('template.template')
@section('content')
<div class="container">
    <form action="/add-pokemon" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nom" placeholder="Nom du pokemon" value="{{old('nom')}}">
    <select name="type_id" value="{{old('type_id')}}">
        <option>Type</option>
            @foreach($type as $elem)
            <option value="{{$elem->id}}">{{$elem->nom}}</option>
            @endforeach
        </select>
    <input type="file" name="image" value="{{old('image')}}">
    <input type="number" name="niveau" placeholder="Niveau du pokemon" value="{{old('lastname')}}">
    <button type="submit">Add</button>
    </form>
</div>
@endsection