@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
    Club des Usagers de l'Espace galactique
@stop
@section('titre_contenu')
    Liste des membres
@stop
@section('contenu')
    @foreach ($les_membres as $membre)
        <div class="member-card">
            <h3>{{ $membre->prenom }} {{ $membre->nom }}</h3>
            <div class="member-info">
                <p><strong>Email :</strong>
                    @auth
                        {{ $membre->adresse }}
                    @else
                        (connectez-vous pour voir cette information)
                    @endauth
                </p>

                @if(auth()->check() && auth()->id() == $membre->id)
                    <div class="member-actions">
                        <a href="/modifier/{{ $membre->id }}" class="btn-edit">
                            Modifier mon profil
                        </a>
                    </div>
                @endif
            </div>
        </div>

        @if(auth()->check())
            <div class="back-link">
                <a href="{{ url('/membres') }}">← Retour à la liste</a>
            </div>
        @endif
    @endforeach
    <a href="{{ url('/creer') }}"> Créer nouveau membre </a>
@stop
@section('pied_page')
    LP3MI 2025
@stop
