<!DOCTYPE html>
<html>
<head>
    <title>Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Event: {{ $name }}</h1>
        
        <ul class="space-y-2">
            <li><strong>Total ticket :</strong> {{ $availability['total'] ?? 0}}</li>
            <li><strong>Total sold paid :</strong> {{ $availability['sold_paid'] ?? 0}}</li>
            <li><strong>Total sold unpaid :</strong> {{ $availability['sold_unpaid'] ?? 0}}</li>
            <li><strong>Reserved :</strong> {{ $availability['reserved'] ?? 0}}</li>
            <li><strong>locked hard :</strong> {{ $availability['locked_hard'] ?? 0}}</li>
            <li><strong>locked soft :</strong> {{ $availability['locked_soft'] ?? 0}}</li>
            <li><strong>complimentary :</strong> {{ $availability['complimentary'] ?? 0}}</li>
            <li><strong>free :</strong> {{ $availability['free'] ?? 0}}</li>
        </ul>

        <a href="/" class="mt-4 inline-block text-blue-500 underline">Back</a>
    </div>
</body>