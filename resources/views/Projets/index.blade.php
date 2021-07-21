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
        <a href="/projets/create" class="btn btn-secondary">Nouveau projet</a>
    </div>

    <div class="table-responsive">
    <table class="text-center table table-striped table-hover text-dark">
        <thead class="bg-ocean text-dark">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

                @if ($projets->count() == 0)
                    <tr>
                        <div class="alert alert-warning text-center">Pas de projet pour le moment !!</div>
                    </tr>

                @else
                    @foreach ($projets as $projets)
                        <tr text-dark>
                            <td>{{ $projets->name }}</td>
                            <td>{{ $projets->description }}</td>
                            <td>{{ $projets->created_at }}</td>
                            <td>
                                <a href="{{route('projets.detail', $projets->id)}}" class="btn btn-sm btn-secondary">Voir</a>
                                <form action=" " method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Supprimer" class="btn btn-sm btn-danger" onclick="return confirm('Confimer la suppression ?')">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
        </tbody>
    </table>
    </div>

  @endsection
