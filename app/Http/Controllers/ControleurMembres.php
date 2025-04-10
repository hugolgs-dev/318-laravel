<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Membre;
use Illuminate\Support\Facades\Auth;
class ControleurMembres extends Controller
{
    /*
    public function index() {
        $membres = Membre::all();
        return view('pages_site/membres', compact('membres'));
    }*/

    // des variables
    protected $les_membres;
    protected $soumissions;
    public function __construct( Membre $membres, Request $requetes) {
        $this->les_membres = $membres;
        $this->soumissions = $requetes;
    }
    public function index() {
        $les_membres = $this->les_membres->all();
        return view('pages_site/consultation_edition', compact('les_membres'));
    }
    public function afficher($numero) {
        try {
            $un_membre = $this->les_membres->with('biographie')->findOrFail($numero);
            $canEdit = auth()->check() && auth()->id() == $numero;

            return view('pages_site/membre', compact('un_membre', 'canEdit'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return view('pages_site/error', [
                'error' => 'Membre non trouvé',
                'error_details' => "Aucun membre ne correspond à l'ID #$numero"
            ]);
        }
    }
    public function creer() {
        return view('pages_site/creation');
    }
    public function enregistrer(Request $request) {
        $membre = new membre();
        $membre->nom = $request->nom;
        $membre->adresse = $request->adresse;
        $membre->prenom = $request->prenom;
        $membre->save();

        if ($request->filled('biographie')) {
            $membre->biographie()->create([
                'contenu' => $request->biographie
            ]);
        }

        return view('pages_site/confirmation', [
            'message' => 'Membre créé avec succès',
            'membre' => $membre,
            'action' => 'creation'
        ]);
    }
    public function editer($numero) {
        // Vérification de l'identité pour accéder à la page.
        if(auth()->id() != $numero) {
            return view('pages_site/error', [
                'error' => 'Accès refusé',
                'error_details' => 'Vous ne pouvez modifier que votre propre profil'
            ]);
        }

        try {
            $un_membre = $this->les_membres->with('biographie')->findOrFail($numero);
            return view('pages_site/edition', compact('un_membre'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return view('pages_site/error', [
                'error' => 'Membre non trouvé',
                'error_details' => "Impossible de modifier: aucun membre avec l'ID #$numero"
            ]);
        }
    }
    public function miseAJour(Request $request, $numero) {
        if(auth()->id() != $numero) {
            abort(403, 'Accès interdit. Vous ne pouvez modifier que votre profil.');
        }

        // Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|email|unique:membres,adresse,'.$numero,
            'biographie' => 'nullable|string'
        ]);

        // Mise à jour du membre
        $un_membre = $this->les_membres->findOrFail($numero);
        $un_membre->nom = $request->nom;
        $un_membre->prenom = $request->prenom;
        $un_membre->adresse = $request->adresse;
        $un_membre->save();

        // Mise à jour ou création de la biographie
        if ($request->filled('biographie')) {
            $un_membre->biographie()->updateOrCreate(
                ['membre_id' => $numero],
                ['contenu' => $request->biographie]
            );
        } else {
            // Supprime la biographie si le champ est vide
            $un_membre->biographie()->delete();
        }

        return view('pages_site/confirmation', [
            'message' => 'Membre et biographie mis à jour avec succès',
            'membre' => $un_membre,
            'action' => 'modification'
        ]);
    }

    public function identite() {
        if (Auth::check())
        {
            $utilisateur = Auth::user();
            $id = Auth::id();
            return view('pages_site/identite',compact('utilisateur','id'));
        }
        else
            return view('pages_site/error', ['error' => 'Accès non autorisé']);
    }

    public function acces_protege() {
        if (Auth::check())
        {
            $infos_utilisateur = Auth::user();
            return view('pages_site/protege', ['utilisateur' => $infos_utilisateur->name]);
        }
        else return view('pages_site/error', ['error' => 'Veuillez vous connecter.']);
    }
}
