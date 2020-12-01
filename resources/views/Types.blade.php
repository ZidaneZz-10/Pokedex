@extends('template.template')
@section('content')
<div class="container">
   @foreach($types as $type)
        <a href="/type/{{$type->id}}">{{$type->nom}}</a><br>
        <form action=""></form>
        <form action="/type-delete/{{$type->id}}" method="POST">
        @csrf
        <button type="submit">delete</button>
    </form>
   @endforeach
</div>
@endsection