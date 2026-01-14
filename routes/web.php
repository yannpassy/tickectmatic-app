<?php
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/deviner-genre/{nom}', function ($nom) {
    // Appel à l'API externe
    $response = Http::get("https://api.genderize.io/", [
        'name' => $nom,
    ]);

    // Transformation de la réponse en tableau PHP
    $donnees = $response->json();

    // Envoi des données à une vue "gender.blade.php"
    return view('gender', ['resultat' => $donnees]);
});


