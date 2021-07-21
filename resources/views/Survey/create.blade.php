@extends('welcome')

@section('content')

<div class="container">
  <h2 class="text-center my-5">Sondage :  {{$projet->name}}</h2>

<form class="row g-3 needs-validation" method="post" action="{{route("survey.store", $projet->id)}}">
  @csrf

    <div class="col-md-12 text-center"hidden>
      <input type="text" name="projet_id" id="projet_id" value="{{$projet->id}}" required class="text-center">
    </div>

    <div class="col-md-12 text-center">
      <label for="date_debut" class="form-label">Date de début :</label>
      <input type="date" name="date_debut" id="date_debut" required>
      <div class="text-danger">{{ $errors->first('date_debut', ":message") }}</div>
    </div>

    <div class="col-md-12 text-center">
      <label for="date_fin" class="form-label">Date de début :</label>
      <input type="date" name="date_fin" id="date_fin" required>
      <div class="text-danger">{{ $errors->first('date_fin', ":message") }}</div>
    </div>

    <div class="col-12 text-center">
      <button class="btn btn-primary" type="submit">Lancer Sondage</button>
    </div>
  </form>
</div>

  @endsection
