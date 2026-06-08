@extends('layouts.app')

@section('content')

    <div class="max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Editar Tarea</h2>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('tareas.update', $tarea) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                    <input type="text" name="titulo"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           value="{{ $tarea->titulo }}" required>
                    @error('titulo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <textarea name="descripcion" rows="3"
                              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $tarea->descripcion }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="completada" value="1"
                               class="w-4 h-4 text-blue-500"
                               {{ $tarea->completada ? 'checked' : '' }}>
                        <span class="text-sm font-medium text-gray-700">Marcar como completada</span>
                    </label>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('tareas.index') }}" class="text-gray-500 hover:text-gray-700">Cancelar</a>
                    <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection