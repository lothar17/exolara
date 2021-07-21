@extends('welcome')

@section('content')

    @if (session('success'))
    <div class="alert alert-warning alert-dismissable fade show text-center" role="alert">
        {!! session('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('warning'))
    <div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
    {!! session('warning') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif

    <div class="d-flex justify-content-center align-itmes-center my-3">
        <a href="" class="btn btn-secondary">Nouveau sondage (not implanted)</a>
    </div>

    <div class="table-responsive">
    <table class="text-center table table-striped table-hover text-dark">
        <thead class="bg-ocean text-dark">
            <tr>
                <th>Nom</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Status</th>
                <th>Resultat</th>
                <th>Date de création</th>
                <th>Consulter</th>
            </tr>
        </thead>
        <tbody>

                @if ($surveys->count() == 0)
                    <tr>
                        <div class="alert alert-warning text-center">Pas de sondage pour le moment !!</div>
                    </tr>

                @else
                    @foreach ($surveys as $surveys)
                        <tr text-dark>
                            <td>{{ $surveys->name }}</td>
                            <td>{{ $surveys->date_debut }}</td>
                            <td>{{ $surveys->date_fin }}</td>
                            <td>{{ $surveys->status }}</td>
                            <td>{{ $surveys->resultat }}</td>
                            <td>{{ $surveys->created_at }}</td>
                            <td>
                                soon - un bouton
                            </td>
                        </tr>
                    @endforeach
                @endif
        </tbody>
    </table>
    </div>

  @endsection