@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Mis Tareas</h2>
        <a href="{{ route('tareas.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Nueva Tarea
        </a>
    </div>

    <div class="flex gap-2 mb-6">
        <a href="{{ route('tareas.index') }}"
           class="px-4 py-2 rounded {{ $filtro === null ? 'bg-gray-800 text-white' : 'bg-white text-gray-600 hover:bg-gray-50' }}">
            Todas
        </a>
        <a href="{{ route('tareas.index', ['filtro' => 'pendientes']) }}"
           class="px-4 py-2 rounded {{ $filtro === 'pendientes' ? 'bg-gray-800 text-white' : 'bg-white text-gray-600 hover:bg-gray-50' }}">
            Pendientes
        </a>
        <a href="{{ route('tareas.index', ['filtro' => 'completadas']) }}"
           class="px-4 py-2 rounded {{ $filtro === 'completadas' ? 'bg-gray-800 text-white' : 'bg-white text-gray-600 hover:bg-gray-50' }}">
            Completadas
        </a>
    </div>

    @if($tareas->isEmpty())
        <div class="bg-white rounded-lg p-8 text-center text-gray-500">
            No hay tareas todavía.
        </div>
    @else
        <div class="flex flex-col gap-3">
            @foreach($tareas as $tarea)
                <div class="bg-white rounded-lg shadow p-4 flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold {{ $tarea->completada ? 'line-through text-gray-400' : 'text-gray-800' }}">
                            {{ $tarea->titulo }}
                        </h3>
                        @if($tarea->descripcion)
                            <p class="text-sm text-gray-500 mt-1">{{ $tarea->descripcion }}</p>
                        @endif
                        <span class="text-xs mt-2 inline-block px-2 py-1 rounded-full {{ $tarea->completada ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $tarea->completada ? 'Completada' : 'Pendiente' }}
                        </span>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('tareas.edit', $tarea) }}"
                           class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded hover:bg-gray-200">
                            Editar
                        </a>
                        <form action="{{ route('tareas.destroy', $tarea) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-sm bg-red-100 text-red-700 px-3 py-1 rounded hover:bg-red-200">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection