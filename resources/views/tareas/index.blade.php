<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
</head>
<body>
    <h1>Mis Tareas</h1>
    <div>
    <a href="{{ route('tareas.index') }}">Todas</a>
    <a href="{{ route('tareas.index', ['filtro' => 'pendientes']) }}">Pendientes</a>
    <a href="{{ route('tareas.index', ['filtro' => 'completadas']) }}">Completadas</a>
</div>

    <a href="{{ route('tareas.create') }}">Nueva Tarea</a>

    @if($tareas->isEmpty())
        <p>No hay tareas todavía.</p>
    @else
        @foreach($tareas as $tarea)
    <div>
        <h3>{{ $tarea->titulo }}</h3>
        <p>{{ $tarea->descripcion }}</p>
        <p>Estado: {{ $tarea->completada ? 'Completada' : 'Pendiente' }}</p>
        <a href="{{ route('tareas.edit', $tarea) }}">Editar</a>

        <form action="{{ route('tareas.destroy', $tarea) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </div>
@endforeach
    @endif
</body>
</html>