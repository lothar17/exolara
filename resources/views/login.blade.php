@extends('welcome')

@section('content')

<div class="container">
  <h2 class="text-center">Connection</h2>
<form class="row g-3 needs-validation" method="POST" action="{{ route('user.login') }}">
    @csrf
    <div class="col-md-12">
        <label for="email" class="form-label">Email :</label>
        <input type="email" name="email" class="form-control" id="email" value="" required>
      </div>
      
    <div class="col-md-12">
        <label for="password" class="form-label">Mot de passe :</label>
        <input type="password" name="password" class="form-control" id="password" value="" required>
      </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Envoyer</button>
    </div>
  </form>
</div>

  @endsection