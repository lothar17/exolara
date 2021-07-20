@extends('welcome')

@section('content')
    <h1 class="text-center text-danger">Liste des contacts</h1>

    @if (session("success"))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
    @endif

    @php
        $vouter = session()->get('vouter');
              
    @endphp


    <div class="d-flex justify-content-center">
        <a href="" class="btn btn-primary my-3">Ajouter contact</a>
    </div>

    @if($vouter)
    <div class="table-responsive">
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date de naissance</th>
                    <th>Tel</th>           
                    <th>Date de création</th>
                    <th>Date de modification</th>
                    <th>Paramètres</th>
                </tr>
            </thead>

            <tbody>
                
                <tr>
                    <td>{{ $vouter->first_name }}</td>
                    <td>{{ $vouter->last_name }}</td>
                    <td>{{ $vouter->email }}</td>
                    <td>{{ $vouter->birthdate }}</td>                    
                    <td>{{ $vouter->phone_number }}</td>
                    <td>{{ $vouter->created_at }}</td>
                    <td>{{ $vouter->updated_at }}</td>
                    <td>
                        <a href="" class="btn btn-secondary">Modifier</a>
                        <form action="" method ="POST" class="d-inline" onclick="return confirm('Confirmer la suppression ?')"
                            >
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Supprimer">
                        </form>
                    </td>
                </tr>
                    
                
            </tbody>
        </table>
    </div>
    @endif

@endsection