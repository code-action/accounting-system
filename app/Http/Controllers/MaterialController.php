<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Empaque;
use App\Models\Medida;
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
        $proveedores = Proveedor::all();
        return view('materiales.index', compact('materials', 'proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        $empaques = Empaque::orderBy('emp_nombre')->get();
        $medidas = Medida::orderBy('med_nombre')->get();
        return view('materiales.create', compact('empaques', 'proveedores', 'medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'mat_nombre' => 'required',
            // Matriz
            'mat_cantidad' => 'required|array|min:1',
            'mat_precio_u' => 'required|array|min:1',
            'prov_nombre' => 'required|array|min:1',

            // Campos de la matriz

        ]);

        //Material::create($request->all());
        $material = new Material();
        $material->mat_nombre = $request->mat_nombre;
        $material->mat_cantidad = 0;
        $material->empaque_id=$request->empaque_id;
        $material->mat_contenido=$request->mat_contenido;
        $material->medida_id=$request->medida_id;
        $material->save();

        for ($i = 0; $i < count($request->prov_nombre); $i++) {
            //echo $request->prov_nombre[$i];
            $material->proveedores()->attach($request->prov_nombre[$i],
                ['mat_prov_preciou' => $request->mat_precio_u[$i],
                    'mat_prov_cantidad' => $request->mat_cantidad[$i]]);
        }

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedores = Proveedor::all();
        $material = Material::findOrFail($id);
        $empaques = Empaque::orderBy('emp_nombre')->get();
        $medidas = Medida::orderBy('med_nombre')->get();
        return view('materiales.edit', compact('material', 'proveedores', 'empaques', 'medidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        /*$request->validate([
            'mat_nombre' => 'required',
            'mat_cantidad' => 'required',
            'prov_nombre' => 'required'
        ]);*/

        $material = Material::find($id);
        //$material->update($request->all());
        $material->mat_nombre = $request->mat_nombre;
        $material->mat_cantidad = 0;
        $material->empaque_id=$request->empaque_id;
        $material->mat_contenido=$request->mat_contenido;
        $material->medida_id=$request->medida_id;
        $material->save();
        //dd($material->pivot);
        if ($request->id_eliminados) {
            DB::table('material_proveedor')->whereIn('id', $request->id_eliminados)->delete();
        }

        if ($request->nuevo_prov_nombre) {
            for ($i = 0; $i < count($request->nuevo_prov_nombre); $i++) {
                //echo $request->prov_nombre[$i];
                $material->proveedores()->attach($request->nuevo_prov_nombre[$i],
                    ['mat_prov_preciou' => $request->nuevo_mat_precio_u[$i],
                        'mat_prov_cantidad' => $request->nuevo_mat_cantidad[$i]]);
            }
        }

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
