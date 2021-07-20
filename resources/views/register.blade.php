@extends('welcome')

@section('content')

<div class="container">
  <h2 class="text-center">Inscription</h2>
<form class="row g-3 needs-validation" method="post" action="{{ route('vouter.store') }}">
  @csrf
    <div class="col-md-12">
      <label for="prenom" class="form-label">Prénom :</label>
      <input type="text" name="prenom" class="form-control" id="prenom" value="{{ old('prenom') }}" required> 
      <div class="text-danger">{{ $errors->first('prenom', ":message") }}</div>      
    </div>
    <div class="col-md-12">
      <label for="nom" class="form-label">Nom :</label>
      <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom') }}" required>
      <div class="text-danger">{{ $errors->first('nom', ":message") }}</div>
    </div>
    <div class="col-md-12">
        <label for="email" class="form-label">Email :</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
        <div class="text-danger">{{ $errors->first('email', ":message") }}</div>
      </div>
      <div class="col-md-12">
        <label for="age">Date de naissance:</label>
        <input type="date" name="age" id="age" name="" required>
        <div class="text-danger">{{ $errors->first('age', ":message") }}</div>
      </div>
      <div class="col-md-12">
        <label for="tel">Numéro de téléphone:</label>
        <input type="tel" name="tel" id="tel" name="" required>
        <div class="text-danger">{{ $errors->first('tel', ":message") }}</div>
      </div>
      
    <div class="col-md-12">
    <label for="parti" class="form-label">Choisir son afiliation politique</label>
    <select class="form-select" name="parti" aria-label="Default select example">   
        <option disabled selected>Ouvrez le menu</option>
        <option value="1">PCF</option>
        <option value="2">PS</option>
        <option value="3">LREM</option>
        <option value="4">LR</option>
        <option value="5">UDI</option>
        <option value="6">RN</option>
      </select>
      <div class="text-danger">{{ $errors->first('parti', ":message") }}</div>
    </div>
    <div class="col-md-12">
        <label for="password" class="form-label">Mot de passe :</label>
        <input type="password" name="password" class="form-control" id="password" value="" required>
        <div class="text-danger">{{ $errors->first('password', ":message") }}</div>
      </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Envoyer</button>
    </div>
  </form>
</div>

  @endsection