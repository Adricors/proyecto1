<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $filtro = $request->query('filtro');

    $tareas = match($filtro) {
        'completadas' => Tarea::where('completada', true)->get(),
        'pendientes'  => Tarea::where('completada', false)->get(),
        default       => Tarea::all(),
    };

    return view('tareas.index', compact('tareas', 'filtro'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('tareas.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|max:255',
        'descripcion' => 'nullable|max:1000',
    ]);

    Tarea::create([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'completada' => false,
    ]);

    return redirect()->route('tareas.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
{
    return view('tareas.edit', compact('tarea'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
{
    $request->validate([
        'titulo' => 'required|max:255',
        'descripcion' => 'nullable|max:1000',
    ]);

    $tarea->update([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'completada' => $request->has('completada'),
    ]);

    return redirect()->route('tareas.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
{
    $tarea->delete();
    return redirect()->route('tareas.index');
}
}
