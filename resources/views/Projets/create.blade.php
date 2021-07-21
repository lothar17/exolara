@extends('welcome')

@section('content')

<div class="container">
  <h2 class="text-center">Projet de loi</h2>
<form class="row g-3 needs-validation" method="post" action="{{route("projets.store")}}">
  @csrf


    <div class="col-md-12">
      <label for="name" class="form-label">Nom :</label>
      <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
      <div class="text-danger">{{ $errors->first('name', ":message") }}</div>
    </div>

    <div class="col-md-12">
        <label for="descr" class="form-label">Description :</label>
        <textarea name="description" id="descr" cols="30" rows="10" class="form-control" required>
            {{ old('descr') }}
        </textarea>
        <div class="text-danger">{{ $errors->first('descr', ":message") }}</div>
      </div>

    <div class="col-12">
      <button class="btn btn-primary" type="submit">Envoyer</button>
    </div>
  </form>
</div>

  @endsection