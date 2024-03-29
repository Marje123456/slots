<?php

namespace App\Http\Controllers;

use App\Models\Responsible;
use Illuminate\Http\Request;

class ResponsibleController extends Controller
{
    /**
     * Display a listing of the resource. Mostrar un listado del recurso. Leer todos los registros / Mostrar
     */
    public function index()
    {
        //
        $responsibles = Responsible::all();
        return view('responsible.index',compact('responsibles'));
    }

    /**
     * Show the form for creating a new resource. Muestra el formulario para crear un nuevo recurso. Formulario para nuevo registro
     */
    public function create()
    {
        //

        return view('responsible.create');
    }

    /**
     * Store a newly created resource in storage. Almacena un recurso recién creado en el almacén. Guardar en sb el nuevo registro
     */
    public function store(Request $request)
    {
        //
        $request->validate
        ([
            'idc' => 'required|min:6|max:15',
            'names' => 'required|min:3|max:50',
            'last_names' => 'required|min:3|max:50',
            'phone' => 'min:8|max:32'
        ]);
        /* return $request->all(); */
        $responsible = Responsible::create($request->all());
        return redirect()->route('responsible.index');
    }

    /**
     * Display the specified resource. Muestra el recurso especificado. Visualizar un registro especifico
     */
    public function show(Responsible $responsible)
    {
        //
        return view('responsible.show');
    }

    /**
     * Show the form for editing the specified resource. Mostrar el formulario para editar el recurso especificado. 
     */
    public function edit(Responsible $responsible)
    {
        //
        return view('responsible.edit', compact('responsible'));
    }

    /**
     * Update the specified resource in storage. Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(Request $request, Responsible $responsible)
    {
        //
        $request->validate
        ([
            'idc' => 'required|min:6|max:15',
            'names' => 'required|min:3|max:50',
            'last_names' => 'required|min:3|max:50',
            'phone' => 'min:8|max:32'
        ]);

        $responsible->update($request->all());
        return redirect()->route('responsible.edit', $responsible);
    }

    /**
     * Remove the specified resource from storage. Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Responsible $responsible)
    {
        //
        $responsible->delete();
        return redirect()->route('responsible.index');
    }
}
