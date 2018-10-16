@extends('layouts.app')

@section('content')
    <h2>Résultat de la recherche</h2>
    @foreach( $location as $loc))
    	<div>{{$loc}}</div>
    @endforeach
@endsection