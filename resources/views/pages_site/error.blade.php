@extends('pages_site/fond')

@section('titre')
    Erreur - Club des Usagers de l'Espace galactique
@stop

@section('titre_contenu')
    Une erreur est survenue
@stop

@section('contenu')
    <div class="error-container">
        <div class="alert alert-danger">
            <h2>{{ $error }}</h2>
            <p>{{ $error_details }}</p>
        </div>

        <div class="error-actions">
            <a href="/membres" class="btn btn-primary">
                Retour à la liste des membres
            </a>
            @auth
                <a href="/modifier/{{ auth()->id() }}" class="btn btn-secondary">
                    Modifier mon profil
                </a>
            @else
                <a href="/login" class="btn btn-secondary">
                    Se connecter
                </a>
            @endauth
        </div>
    </div>
@stop

@section('pied_page')
    LP3MI 2025
@stop
