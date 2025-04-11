@extends('pages_site.fond')

@section('entete')
    <title>Validation des utilisateurs</title>
@stop

@section('titre')
    Administration
@stop

@section('titre_contenu')
    Demandes d'inscription en attente
@stop

@section('contenu')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($users->count() > 0)
            <table class="table">
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form method="POST" action="/admin/approve_user/{{ $user->id }}">
                                @csrf
                                <button type="submit" class="btn btn-success">Approuver</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="alert alert-info">Aucune demande d'inscription en attente</div>
        @endif
    </div>
@stop

@section('pied_page')
    © Administration - LP3MI
@stop
