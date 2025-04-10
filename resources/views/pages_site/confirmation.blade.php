@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
    Confirmation - Club des Usagers de l'Espace galactique
@stop
@section('titre_contenu')
    Confirmation d'opération
@stop
@section('contenu')
    <div class="confirmation-box">
        <div class="alert alert-success">
            {{ $message }}
        </div>

        <div class="member-details">
            <h3>{{ $membre->prenom }} {{ $membre->nom }}</h3>
            <p><strong>Email :</strong> {{ $membre->adresse }}</p>
        </div>

        <div class="action-buttons">
            <a href="/membre/{{ $membre->id }}" class="btn btn-view">
                Voir le profil
            </a>
            <a href="/membres" class="btn btn-list">
                Liste des membres
            </a>
            @if($action == 'modification')
                <a href="/modifier/{{ $membre->id }}" class="btn btn-edit">
                    Modifier à nouveau
                </a>
            @else
                <a href="/creer" class="btn btn-new">
                    Créer un autre membre
                </a>
            @endif
        </div>
    </div>
@stop
@section('pied_page')
    LP3MI 2025
@stop
