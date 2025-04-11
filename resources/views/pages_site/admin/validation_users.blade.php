User::create([
'name' => 'admin',
'email' => 'admin@admin.fr',
'password' => Hash::make('admin123'),
'role' => 'admin',
'approved' => true
]);

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
    @auth
        @if(auth()->user()->isAdmin())
            <!-- Contenu admin sécurisé -->
            <div class="container">
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
                    <div class="alert alert-info">Aucune demande en attente</div>
                @endif
            </div>
        @else
            <div class="alert alert-danger">
                <i class="fas fa-lock"></i> Accès réservé aux administrateurs
            </div>
        @endif
    @else
        <div class="alert alert-warning">
            <a href="{{ route('login') }}" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Connectez-vous
            </a>
        </div>
    @endauth
@stop

@section('pied_page')
    © Administration - LP3MI
@stop
