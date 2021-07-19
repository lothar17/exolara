@extends('welcome')

@section('content')

<div class="container">
<form class="row g-3 needs-validation" novalidate>
    
    <div class="col-md-12">
        <label for="validationCustom03" class="form-label">Email :</label>
        <input type="email" class="form-control" id="validationCustom02" value="" required>
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