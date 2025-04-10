<!DOCTYPE html>
<html>
<head>
    <!-- LP3MI -->
    <link rel='stylesheet' href='/css/mon_style.css'>
    @yield('entete')
    <title>
        @yield('titre')
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('layouts.navigation')
<div class="container">
    <div class="titre_contenu">
        @yield('titre_contenu')
    </div>
    <div class="contenu">
        @yield('contenu')
    </div>
    <div class="pied_page">@yield('pied_page')</div>
</div>
</body>
</html>
