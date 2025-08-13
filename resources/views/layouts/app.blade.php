<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Cuniculture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 15px; }
        .stat-card { color: white; padding: 20px; border-radius: 15px; }
        .stat-card h5 { font-weight: bold; }
        .stat-card .stat-icon { font-size: 2.5rem; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">🐇 Cuniculture</a>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<footer class="bg-dark text-white text-center py-3 mt-4">
    &copy; {{ date('Y') }} Gestion de Cuniculture - Tous droits réservés.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
