@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
    Club des Usagers de l'Espace galactique
@stop
@section('titre_contenu')
    Création d'un nouveau membre
@stop
@section('contenu')
    <div class="formgroup">
        {!! Html::form()->open(['url' => 'creation/membre']) !!}
        <div class="formgroup">
            {!! Html::label('nom', 'Nom') !!}
            {!! Html::text('nom', null, ['class' => 'formcontrol', 'required'])!!}
        </div>
        <div class="formgroup">
            {!! Html::label('prenom', 'Prenom') !!}
            {!! Html::text('prenom', null, ['class' => 'formcontrol', 'required'])!!}
        </div>
        <div class="formgroup">
            {!! Html::label('adresse', 'Adresse électronique') !!}
            {!! Html::text('adresse', null, ['class' => 'formcontrol', 'required|email'])!!}
        </div>

        <div class="formgroup">
            <label for="biographie">Biographie :</label>
            <textarea id="biographie" name="biographie" class="form-control" rows="5">{{ old('biographie') }}</textarea>
        </div>

        <p>
        </p>
        {!! Html::submit("Creation membre") !!}
        {!! Html::form()->close() !!}
    </div>
@stop
@section('pied_page')
    LP3MI 2025
@stop
