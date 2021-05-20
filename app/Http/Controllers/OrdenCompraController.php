<?php

namespace App\Http\Controllers;

use App\Models\OrdenCompra;
use App\Models\Proveedor;
use App\Models\Material;
use DB;
use Exception;
use App\Models\MateriaOrden;
use Illuminate\Http\Request;

class OrdenCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenesCompras= OrdenCompra::orderBy('ord_numero')->get();
        return view('ordenescompras.index',compact('ordenesCompras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores= Proveedor::orderBy('prov_nombre')->get();
        $materiales= Material::orderBy('mat_nombre')->get(['id','mat_nombre']);
        return view('ordenescompras.create',compact('proveedores','materiales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $ordenCompra=new OrdenCompra();
            $ordenCompra->ord_numero=$request->ord_numero;
            $ordenCompra->ord_fecha=$request->ord_fecha;
            $ordenCompra->proveedor_id=$request->proveedor_id;
            $ordenCompra->save();
            
            $material_id=$request->material_id;
            $mo_cantidad=$request->mo_cantidad;
            $mo_costo=$request->mo_costo;

            // print_r($material_id);
            // print_r($mo_cantidad);
            // print_r($mo_costo);

            for($i=0;$i<count($material_id);$i++){
                $materiaOrden=new MateriaOrden();

                $materiaOrden->orden_id=$ordenCompra->id;
                $materiaOrden->material_id=$material_id[$i];
                $materiaOrden->mo_cantidad=$mo_cantidad[$i];
                $materiaOrden->mo_costo=$mo_costo[$i];
                $materiaOrden->save();
            }
            DB::commit();
            return redirect()->route('ordencompra.index')->with('success','Registro creado exitosamente.');
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('ordencompra.index')->with('error','El registro no pudo crearse.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdenCompra  $ordenCompra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordenCompra=OrdenCompra::find($id);
        return view('ordenescompras.show',compact('ordenCompra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdenCompra  $ordenCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenCompra $ordenCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdenCompra  $ordenCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenCompra $ordenCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdenCompra  $ordenCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy($ordenCompra_id)
    {
        $ordenCompra = OrdenCompra::find($ordenCompra_id);
        DB::beginTransaction();
        try{
            foreach($ordenCompra->materiaOrden as $materia){
                $materia->delete();
            }
            $ordenCompra->delete();
            DB::commit();
            return redirect()->route('ordencompra.index')->with('success','Registro eliminado exitosamente.');
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('ordencompra.index')->with('error','El registro no pudo eliminarse.');
        }
    }
}