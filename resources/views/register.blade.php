@extends('welcome')

@section('content')

<div class="container">
  <h2 class="text-center text-primary">Inscription</h2>
<form class="row g-3 needs-validation" method="post" action="{{ route('vouter.store') }}">
  @csrf
    <div class="col-md-12">
      <label for="first_name" class="form-label">Prénom :</label>
      <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name') }}" required> 
      <div class="text-danger">{{ $errors->first('first_name', ":message") }}</div>      
    </div>
    <div class="col-md-12">
      <label for="last_name" class="form-label">Nom :</label>
      <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name') }}" required>
      <div class="text-danger">{{ $errors->first('last_name', ":message") }}</div>
    </div>
    <div class="col-md-12">
        <label for="email" class="form-label">Email :</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
        <div class="text-danger">{{ $errors->first('email', ":message") }}</div>
      </div>
      <div class="col-md-12">
        <label for="birthdate">Date de naissance:</label>
        <input type="date" name="birthdate" id="birthdate" name="" required>
        <div class="text-danger">{{ $errors->first('birthdate', ":message") }}</div>
      </div>
      <div class="col-md-12">
        <label for="phone_number">Numéro de téléphone:</label>
        <input type="phone_number" name="phone_number" id="phone_number" name="" required>
        <div class="text-danger">{{ $errors->first('phone_number', ":message") }}</div>
      </div>
      
    <div class="col-md-12">
    <label for="parti" class="form-label">Choisir son afiliation politique</label>
    <select class="form-select" name="parti" id="parti" aria-label="Default select example">   
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
    <div class="form-row text-center">
      <div class="col-12">
          <button class="btn btn-primary" type="submit">Envoyer</button>
      </div>
    </div>
  </form>
</div>

  @endsection