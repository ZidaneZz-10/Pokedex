@extends('template.template')
@section('content')
<div class="container">
   <form action="update-type/{{$type->id}}" method="post">
   @csrf
   <input type="text" name="nom" value="{{$type->nom}}">
   <button type="submit">Update</button>
</form>
</div>
@endsection