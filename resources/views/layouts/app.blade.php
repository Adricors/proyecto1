<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-3xl mx-auto px-4 py-4">
            <h1 class="text-xl font-bold text-gray-800">Gestor de Tareas</h1>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4">
        @yield('content')
    </main>

</body>
</html>