@extends('welcome')

@php
        $vouter = session()->get('vouter');
              
    @endphp

    @section('content')
    <div class="my-5">
        <h1 class="text-center text-primary">Bienvenue  <u>{{ $vouter->first_name }}</u></h1>

        @if (session("success"))
            <div class="alert alert-success" role="alert">
                {{ session("success") }}
            </div>
        @endif
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
                        <a href="{{ route('user.edit', $vouter->id) }}" class="btn btn-secondary">Modifier</a>
                        <form action="{{ route('user.delete', $vouter->id) }}" method ="POST" class="d-inline" onclick="return confirm('Confirmer la suppression ?')">
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