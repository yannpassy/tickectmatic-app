<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

class GenderController extends Controller
{
    public function check($nom)
    {
        // 1. Appel API
        $response = Http::get("https://api.genderize.io/", [
            'name' => $nom,
        ]);

        if ($response->failed()) {
        return back()->with('error', 'Impossible de contacter le service distant.');
        }

        // 2. Récupération des données
        $resultat = $response->json();

        // 3. Retourner la vue avec les données
        return view('gender', [
            'resultat' => $resultat
        ]);
    }
}
