<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Home | 2Survey</title>

       
    </head>
     
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">2Survey</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/projets/index">Projets</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/survey/index">Sondages</a>
              </li>
              <li class="nav-item text-right">
                <a class="nav-link" href="/register">S'inscrire</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/login">Se connecter</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Déconnection</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      @if (session("success"))
        <div class="alert alert-success text-center" role="alert">
            {{ session("success") }}
        </div>
    @endif

      
    @yield('content')
</html>
