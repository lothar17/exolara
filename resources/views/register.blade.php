@extends('welcome')

@section('content')

<div class="container">
<form class="row g-3 needs-validation" novalidate>
    <div class="col-md-12">
      <label for="validationCustom01" class="form-label">Prénom :</label>
      <input type="text" class="form-control" id="validationCustom01" value="" required>       
    </div>
    <div class="col-md-12">
      <label for="validationCustom02" class="form-label">Nom :</label>
      <input type="text" class="form-control" id="validationCustom02" value="" required>
    </div>
    <div class="col-md-12">
        <label for="validationCustom03" class="form-label">Email :</label>
        <input type="email" class="form-control" id="validationCustom02" value="" required>
      </div>
      <div class="col-md-12">
        <label for="validationCustom04">Date de naissance:</label>
        <input type="date" id="validationCustom04" name="" required>
      </div>
      
    <div class="col-md-12">
    <label for="validationCustom05" class="form-label">Choisir son afiliation politique</label>
    <select class="form-select" aria-label="Default select example">   
        <option selected>Ouvrez le menu</option>
        <option value="1">PCF</option>
        <option value="2">PS</option>
        <option value="3">LREM</option>
        <option value="3">LR</option>
        <option value="3">UDI</option>
        <option value="3">RN</option>
      </select>
    </div>
    <div class="col-md-12">
        <label for="validationCustom06" class="form-label">Mot de passe :</label>
        <input type="password" class="form-control" id="validationCustom06" value="" required>
      </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Envoyer</button>
    </div>
  </form>
</div>

  @endsection