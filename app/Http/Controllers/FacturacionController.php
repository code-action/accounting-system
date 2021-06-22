<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Facturacion;
use App\Models\Informacion;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $facturaciones = Facturacion::all();
        $empresa = Informacion::first();
        return view('facturaciones.index', ['facturaciones' => $facturaciones, 'empresa' => $empresa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        //
    }

    public function crear(Request $request, Cotizacion $cotizacion)
    {
        $cot_id_prod = [];
        $cot_cant = [];
        foreach ($cotizacion->productos as $producto){
            array_push($cot_id_prod, $producto->pivot->producto_id);
            array_push($cot_cant, $producto->pivot->cot_prod_cantidad);
        }
        //dd($cot_id_prod, $cot_cant);

        // Cambiando estado para pasar a facturación
        $cotizacion->cot_estado = 'Aceptada';
        $cotizacion->save();

        // Creando la factura
        $facturacion = new Facturacion();
        $facturacion->fact_fecha = Carbon::now();
        $facturacion->fact_codigo = '00025';
        $facturacion->cotizacion_id = $cotizacion->id;
        $facturacion->cliente_id = $cotizacion->cliente->id;
        $facturacion->fact_sumas = $cotizacion->cot_sumas;
        $facturacion->fact_iva = $cotizacion->cot_iva;
        $facturacion->fact_subtotal = $cotizacion->cot_subtotal;
        $facturacion->fact_retencion = $cotizacion->cot_retencion;
        $facturacion->fact_total = $cotizacion->cot_total;
        $facturacion->save();

        // Agregar productos de la cotización a la facturación
        (new Facturacion())->agregarProductosFacturacion('Guardar', $cotizacion, $facturacion, $cot_id_prod, $cot_cant);

        return redirect()->route('facturacion.edit', $facturacion)->with('success',__('Registro creado exitosamente.'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        //dd($request);
        $cotizacion = new Cotizacion();
        $cotizacion->cot_fecha = \Carbon\Carbon::now();
        $cotizacion->cot_codigo = '00025';
        $cotizacion->cliente_id = $request->cot_cliente_id;
        $cotizacion->cot_descripcion = $request->cot_descripcion;
        $cotizacion->cot_estado = 'Aceptada'; // 1: aceptada, 2: revisión, 3: rechazada
        $cotizacion->cot_sumas = $request->input_cot_sumas;
        $cotizacion->cot_iva = $request->input_cot_iva;
        $cotizacion->cot_subtotal = $request->input_cot_subtotal;
        $cotizacion->cot_retencion = $request->input_cot_retencion;
        $cotizacion->cot_total = $request->input_cot_total;
        $cotizacion->save();

        $cot_id_prod = $request->get('cot_id_prod');
        $cot_cant = $request->get('cot_cant');
        (new Cotizacion())->agregarProductosCotizacion('Guardar', $cotizacion, $cot_id_prod, $cot_cant);

        // Creando la factura
        $facturacion = new Facturacion();
        $facturacion->fact_fecha = Carbon::now();
        $facturacion->fact_codigo = '00025';
        $facturacion->cotizacion_id = $cotizacion->id;
        $facturacion->cliente_id = $cotizacion->cliente->id;
        $facturacion->fact_sumas = $cotizacion->cot_sumas;
        $facturacion->fact_iva = $cotizacion->cot_iva;
        $facturacion->fact_subtotal = $cotizacion->cot_subtotal;
        $facturacion->fact_retencion = $cotizacion->cot_retencion;
        $facturacion->fact_total = $cotizacion->cot_total;
        $facturacion->save();

        // Agregar productos de la cotización a la facturación
        (new Facturacion())->agregarProductosFacturacion('Guardar', $cotizacion, $facturacion, $cot_id_prod, $cot_cant);

        return redirect()->route('facturacion.edit', $facturacion)->with('success',__('Registro creado exitosamente.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function show(Facturacion $facturacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Facturacion $facturacion)
    {
        $clientes = Cliente::orderBy('cli_nombre')->get();
        $productos = Producto::where('prod_cantidad', '>=', 1)->orderBy('prod_nombre')->get();
        $empresa = Informacion::first();

        return view('facturaciones.edit',  ['facturacion' => $facturacion, 'clientes' => $clientes,
            'empresa' => $empresa,'productos' => $productos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Facturacion $facturacion)
    {
        //dd($request, $facturacion);
        $facturacion->fact_codigo = '00025'; // Cambiar
        $facturacion->cliente_id = $request->fact_cliente_id;
        $facturacion->fact_sumas = $request->input_fact_sumas;
        $facturacion->fact_iva = $request->input_fact_iva;
        $facturacion->fact_subtotal = $request->input_fact_subtotal;
        $facturacion->fact_retencion = $request->input_fact_retencion;
        $facturacion->fact_total = $request->input_fact_total;
        $facturacion->save();
        //dd($facturacion);

        $cotizacion = $facturacion->cotizacion;

        $cot_id_prod = $request->get('cot_id_prod');
        $cot_cant = $request->get('cot_cant');
        //dd($facturacion, $cot_id_prod, $cot_cant);
        (new Facturacion())->agregarProductosFacturacion('Actualizar', $cotizacion, $facturacion, $cot_id_prod, $cot_cant);

        return redirect()->route('facturacion.index')->with('success',__('Facturación editada exitosamente.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Facturacion $facturacion)
    {
        $facturacion->delete();
        return redirect()->route('facturacion.index')->with('success', __('Registro eliminado exitosamente.'));
    }
}
