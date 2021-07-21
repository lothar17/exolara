@extends('welcome')

@section('content')

<h2 class="mx-5 my-3">{{$projet->name}}</h2>

<p class="border px-5 py-3"><strong>Détail du projet :</strong> <br><br> {{$projet->description}}</p>

<a href="{{route('survey.create', $projet->id)}}" class="btn btn-sm btn-secondary mx-5">Creer un sondage associé</a>

@endsection