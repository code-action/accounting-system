<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use App\Http\Requests\MedidaRequest;
use Illuminate\Http\Request;
use DB;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medidas = Medida::orderBy('med_nombre')->get();
        return view('medidas.index', compact('medidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medidas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedidaRequest $request)
    {
        $medida= new Medida();
        $medida->med_nombre=$request->med_nombre;
        $medida->med_abreviatura=$request->med_abreviatura;
        $medida->save();

        return redirect()->route('medida.index')->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medida = Medida::findOrFail($id);
        return view('medidas.edit', compact('medida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function update(MedidaRequest $request, Medida $medida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $medida = Medida::find($id)->delete();
            DB::commit();
            return redirect()->route('medida.index')->with('success','Registro eliminado exitosamente.');
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('medida.index')->with('error','El registro no pudo eliminarse.');
        }
    }
}
