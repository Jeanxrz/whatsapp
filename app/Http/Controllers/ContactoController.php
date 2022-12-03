<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Persona;
use App\Http\Requests\StoreContactoRequest;
use App\Http\Requests\UpdateContactoRequest;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contacto::join('personas','personas.id','contactos.persona_id')
        ->select('contactos.id', 'telefono', 'parentesco', 'nombre', 'persona_id')
        ->get();
        return view('contacto.index', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactoRequest $request)
    {
        $contacto = new contacto(); 
        $contacto->telefono = $request->telefono;
        $contacto->parentesco = $request->parentesco;
        $contacto->persona_id = $request->persona_id;
        $contacto->save();

        return redirect()->route('contacto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        $personas = Persona::all();
        return view('contacto.edit', compact('contacto', 'personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactoRequest  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactoRequest $request, Contacto $contacto)
    {
        
        $contacto->telefono = $request->telefono;
        $contacto->parentesco = $request->parentesco;
        $contacto->persona_id = $request->persona_id;
        $contacto->save();

        return redirect()->route('contacto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
    public function eliminar(Contacto $contacto)
    {
        $contacto->delete();
        return response()->json(['mensaje'=> 'Eliminado Correctamente']);
    }
}
