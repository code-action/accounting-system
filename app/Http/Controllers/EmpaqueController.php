<?php

namespace App\Http\Controllers;

use App\Models\Empaque;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpaqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $empaques = Empaque::all();
        return view('empaques.index', compact('empaques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('empaques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'emp_nombre' => [
                'required', 'min:3', 'unique:empaques'
            ],
        ]);

        $empaque = new Empaque();
        $empaque->emp_nombre = $request->emp_nombre;
        $empaque->save();

        return redirect()->route('empaque.index')->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empaque  $empaque
     * @return \Illuminate\Http\Response
     */
    public function show(Empaque $empaque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empaque  $empaque
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Empaque $empaque)
    {
        //dd($material->proveedores);
        return view('empaques.edit', compact('empaque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empaque  $empaque
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Empaque $empaque)
    {
        //
        $request->validate([
            'emp_nombre' => [
                'required', 'min:3', Rule::unique('empaques')->ignore($empaque->id)
            ],
        ]);


        $empaque->emp_nombre = $request->emp_nombre;
        $empaque->save();

        return redirect()->route('empaque.index')->with('success','Registro creado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empaque  $empaque
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Empaque $empaque)
    {
        $empaque->delete();
        return redirect()->route('empaque.index')->with('success', __('Registro eliminado exitosamente.'));
    }
}
