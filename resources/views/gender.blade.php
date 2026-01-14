<!DOCTYPE html>
<html>
<head>
    <title>Résultat API</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Résultat pour : {{ $resultat['name'] }}</h1>
        
        <ul class="space-y-2">
            <li><strong>Genre :</strong> {{ $resultat['gender'] ?? 'Inconnu' }}</li>
            <li><strong>Probabilité :</strong> {{ ($resultat['probability'] ?? 0) * 100 }}%</li>
            <li><strong>Nombre d'occurrences :</strong> {{ $resultat['count'] ?? 0 }}</li>
        </ul>

        <a href="/" class="mt-4 inline-block text-blue-500 underline">Retour</a>
    </div>
</body>