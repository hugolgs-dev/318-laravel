<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class MonControleur extends Controller
{
    public function retourneNouvellePage() {
        return view('nouvellepage');
    }

    public function retournePageExemple() {
        $nom = 'Lignères';
        $prenom = 'Hugo';
        return view('pages_site/ex', compact('nom', 'prenom'));
    }
}
