<?php

namespace App\Http\Controllers;

use App\Models\OrdenCompra;
use App\Models\Proveedor;
use App\Models\Material;
use DB;
use Exception;
use App\Models\MateriaOrden;
use App\Models\MaterialProveedor;
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
        $materiales= Material::orderBy('mat_nombre')->get();
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
            $ordenCompra->ord_total=$request->ord_total;
            if($request->ord_descuento!="")
                $ordenCompra->ord_descuento=$request->ord_descuento;
            else
                $ordenCompra->ord_descuento=0;
            $ordenCompra->ord_iva_incluido=$request->ord_iva_incluido;
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
        $tipo="show";
        return view('ordenescompras.show',compact('ordenCompra','tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdenCompra  $ordenCompra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordenCompra = OrdenCompra::find($id);
        $proveedores = Proveedor::orderBy('prov_nombre')->get();
        $materiales= Material::orderBy('mat_nombre')->get();
        return view('ordenescompras.edit',compact('proveedores','materiales','ordenCompra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdenCompra  $ordenCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $ordenCompra=OrdenCompra::find($id);
        DB::beginTransaction();
        try{
            $ordenCompra->ord_numero=$request->ord_numero;
            $ordenCompra->ord_fecha=$request->ord_fecha;
            $ordenCompra->proveedor_id=$request->proveedor_id;
            $ordenCompra->ord_total=$request->ord_total;
            if($request->ord_descuento!="")
                $ordenCompra->ord_descuento=$request->ord_descuento;
            else
                $ordenCompra->ord_descuento=0;
            $ordenCompra->ord_iva_incluido=$request->ord_iva_incluido;
            $ordenCompra->save();
            
            $material_id=$request->material_id;
            $mo_cantidad=$request->mo_cantidad;
            $mo_costo=$request->mo_costo;
            $estado_fila=$request->estado_fila;
            $materia_orden_id=$request->materia_orden_id;

            // print_r($material_id);
            // print_r($mo_cantidad);
            // print_r($mo_costo);

            for($i=0;$i<count($material_id);$i++){
                if($estado_fila[$i]=="nuevo"){
                    $materiaOrden=new MateriaOrden();

                    $materiaOrden->orden_id=$ordenCompra->id;
                    $materiaOrden->material_id=$material_id[$i];
                    $materiaOrden->mo_cantidad=$mo_cantidad[$i];
                    $materiaOrden->mo_costo=$mo_costo[$i];
                    $materiaOrden->save();
                }elseif($estado_fila[$i]=="eliminado"){
                    $materiaOrden= MateriaOrden::find($materia_orden_id[$i]);
                    $materiaOrden->delete();
                }
            }
            DB::commit();
            return redirect()->route('ordencompra.index')->with('success','Registro editado correctamente.');
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('ordencompra.index')->with('error','El registro no pudo editarse.');
        }
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

    public function factura(Request $request){
        $ordenCompra = OrdenCompra::find($request->id);
        $proveedores = Proveedor::orderBy('prov_nombre')->get();
        $materiales= Material::orderBy('mat_nombre')->get();
        return view('ordenescompras.factura',compact('proveedores','materiales','ordenCompra'));
    }
    public function guardar(Request $request){
        echo $request->id;
        DB::beginTransaction();
        // // try{
            $ordenCompra = OrdenCompra::find($request->id);
            $ordenCompra->ord_numero=$request->ord_numero;
            $ordenCompra->ord_fecha=$request->ord_fecha;
            $ordenCompra->proveedor_id=$request->proveedor_id;
            $ordenCompra->ord_total=$request->ord_total;
            if($request->ord_descuento!="")
                $ordenCompra->ord_descuento=$request->ord_descuento;
            else
                $ordenCompra->ord_descuento=0;
            $ordenCompra->ord_iva_incluido=$request->ord_iva_incluido;
            $ordenCompra->ord_factura=$request->ord_factura;
            $ordenCompra->ord_estado=1;
            $ordenCompra->save();
            
            $material_id=$request->material_id;
            $mo_cantidad=$request->mo_cantidad;
            $mo_costo=$request->mo_costo;
            $mat_prov_lote = $request->mat_prov_lote;
            $mat_prov_fecha_fabricacion = $request->mat_prov_fecha_fabricacion;
            $mat_prov_fecha_vencimiento = $request->mat_prov_fecha_vencimiento;
            // print_r($material_id);
            // print_r($mo_cantidad);
            // print_r($mo_costo);

            for($i=0;$i<count($material_id);$i++){
                $mprov=new MaterialProveedor();

                $mprov->material_id = $material_id[$i];
                $mprov->proveedor_id = $request->proveedor_id;
                $mprov->mat_prov_preciou = $mo_costo[$i];
                $mprov->mat_prov_cantidad = $mo_cantidad[$i];
                $mprov->mat_prov_lote = $mat_prov_lote[$i];
                $mprov->mat_prov_fecha_fabricacion = $mat_prov_fecha_fabricacion[$i];
                $mprov->mat_prov_fecha_vencimiento = $mat_prov_fecha_vencimiento[$i];
                $mprov->mat_prov_disponibles = $mo_cantidad[$i];
                $mprov->orden_id = $ordenCompra->id;
                $mprov->save();
            }
            DB::commit();
            return redirect()->route('ordencompra.index')->with('success','Registro creado exitosamente.');
        // } catch(\Exception $e){
        //     DB::rollback();
        //     return redirect()->route('ordencompra.index')->with('error','El registro no pudo crearse.');
        // }
    }

    public function filtro(Request $request){
        $filtrados=Material::join('empaques','empaques.id','=','materiales.empaque_id')
            ->join('medidas', 'medidas.id', '=', 'materiales.medida_id')
            ->select('materiales.id','materiales.mat_codigo','materiales.mat_nombre','materiales.mat_contenido', 'empaques.emp_nombre', 'medidas.med_abreviatura')
            ->where('mat_codigo','like',"%".$request->buscar."%")
            ->orWhere('mat_nombre','like',"%".$request->buscar."%")
            ->orderBy('mat_nombre')
            ->take(10)
            ->get();
        // $filtrados=Material::where('mat_codigo','like',"%".$request->buscar."%")->orWhere('mat_nombre','like',"%".$request->buscar."%")->with('empaque','medida')->take(10)->get();
        return $filtrados;
    }
}