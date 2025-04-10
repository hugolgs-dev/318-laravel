@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
    Club des Usagers de l'Espace galactique
@stop
@section('titre_contenu')
    Modification des infos du membre
@stop
@section('contenu')
    <div class="formgroup">
        {!! Html::modelForm($un_membre,'PATCH', url('miseAJour',$un_membre->id)) !!}
        <div class="formgroup">
            {{ Html::label('nom', 'Nom') }}
            {{ Html::text('nom') }}
        </div>
        <div class="formgroup">
            {{ Html::label('prenom', 'Prenom :') }}
            {{ Html::text('prenom') }}
        </div>
        <div class="formgroup">
            {{ Html::label('adresse', 'Adresse électronique') }}
            {{ Html::text('adresse') }}
        </div>

        <div class="formgroup">
            <label for="biographie">Biographie :</label>
            <textarea id="biographie" name="biographie" class="form-control" rows="5">{{ $un_membre->biography->contenu ?? '' }}</textarea>
        </div>

        <div class="form-actions">
            {!! Html::submit("Enregistrer", array('class' => 'btn btn-primary')) !!}
            <a href="{{ url('/membre/'.$un_membre->id) }}" class="btn btn-secondary">Annuler</a>
        </div>
        {!! Html::closeModelForm() !!}
    </div>
@stop
@section('pied_page')
    LP3MI 2025
@stop
