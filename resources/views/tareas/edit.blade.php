<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
</head>
<body>
    <h1>Editar Tarea</h1>

    <form action="{{ route('tareas.update', $tarea) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Título</label>
            <input type="text" name="titulo" value="{{ $tarea->titulo }}" required>
        </div>

        <div>
            <label>Descripción</label>
            <textarea name="descripcion">{{ $tarea->descripcion }}</textarea>
        </div>

        <div>
            <label>
                <input type="checkbox" name="completada" value="1" {{ $tarea->completada ? 'checked' : '' }}>
                Completada
            </label>
        </div>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('tareas.index') }}">Volver</a>
</body>
</html>