@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
    Ceci est un exemple de page
@stop
@section('titre_contenu')
    @foreach($membres as $membre)
        <h3>{{ $membre->prenom }} {{ $membre->nom }}</h3>
        <div class="h2">
            @auth
                {{ $un_membre->adresse }}
            @else
                (connectez-vous pour voir cette information)
            @endauth
        </div>
    @endforeach
@stop
@section('contenu')
    <div class='h1'> Ceci est un exemple de contenu </div>
    <p>
        blablabla...
    </p>
    <div class='h2'> C'est tout pour l'instant </div>
@stop
@section('pied_page')
    LP3MI 2025
@stop
