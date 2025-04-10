@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
@stop
@section('titre_contenu')
    <h2>Infos membre</h2>
@stop
@section('contenu')
    <h3>{{ $un_membre->prenom }} {{ $un_membre->nom }}</h3>
    <div class="h2">
        @auth
            {{ $un_membre->adresse }}
        @else
            (connectez-vous pour voir cette information)
        @endauth

        @if(isset($un_membre->biography) && $un_membre->biography->contenu)
            <div class="biographie">
                <h4>Biographie :</h4>
                <p>{{ $un_membre->biography->contenu }}</p>
            </div>
        @endif
    </div>
@stop
@section('pied_page')
    LP3MI 2025
@stop
