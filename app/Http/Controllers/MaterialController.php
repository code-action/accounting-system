<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use DB;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::all();
        return view('materiales.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materiales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mat_nombre' => 'required',
            'mat_cantidad' => 'required'
        ]);

        Material::create($request->all());
        return redirect()->route('raw.index')->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::find($id);
        return view('materiales.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'mat_nombre' => 'required',
            'mat_cantidad' => 'required'
        ]);

        $material = Material::find($id);
        $material->update($request->all());

        return redirect()->route('raw.index') ->with('success','Registro editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $material = Material::find($id)->delete();
            DB::commit();
            return redirect()->route('raw.index')->with('success','Registro eliminado exitosamente.');
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('raw.index')->with('error','El registro no pudo eliminarse.');
        }
    }
}