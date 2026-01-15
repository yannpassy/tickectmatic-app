<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

class GenderController extends Controller
{
    public function check($nom)
    {
        $response = Http::get("https://api.genderize.io/", [
            'name' => $nom,
        ]);

        if ($response->failed()) {
        return back()->with('error', 'Impossible de contacter le service distant.');
        }

        $resultat = $response->json();
        //var_dump($resultat);

        return view('gender', [
            'resultat' => $resultat
        ]);
    }
}
