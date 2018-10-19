@extends('layouts.app')

@section('content')

    <form method="post" action="{{ url('/location/searchResult') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" >
  <p>
  	<label for="ville">Ville recherchée</label>
  	<input type="text" name="ville">
  </p>
  <p>
  	<label></label>
  	<input type="submit" value="rechercher">
  </p>
</form>

@endsection