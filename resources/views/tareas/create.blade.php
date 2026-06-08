<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Tarea</title>
</head>
<body>
    <h1>Nueva Tarea</h1>

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf

        <div>
            <label>Título</label>
            <input type="text" name="titulo" required>
        </div>

        <div>
            <label>Descripción</label>
            <textarea name="descripcion"></textarea>
        </div>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('tareas.index') }}">Volver</a>
</body>
</html>