<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones = Cotizacion::all();
        return view('cotizaciones.index', ['cotizaciones' => $cotizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->format('d-m-Y');
        $clientes = Cliente::orderBy('cli_nombre')->get();
        $productos = Producto::where('prod_cantidad', '>=', 1)->orderBy('prod_nombre')->get();
        return view('cotizaciones.create',  ['hoy' => $hoy, 'clientes' => $clientes, 'productos' => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $cotizacion = new Cotizacion();
        $cotizacion->cot_fecha = Carbon::now();
        $cotizacion->cot_codigo = '00025';
        $cotizacion->cliente_id = $request->cot_cliente_id;
        $cotizacion->cot_descripcion = $request->cot_descripcion;
        $cotizacion->cot_estado = 'Estado'; // cambiar
        $cotizacion->cot_sumas = $request->input_cot_sumas;
        $cotizacion->cot_iva = $request->input_cot_iva;
        $cotizacion->cot_subtotal = $request->input_cot_subtotal;
        $cotizacion->cot_retencion = $request->input_cot_retencion;
        $cotizacion->cot_total = $request->input_cot_total;
        $cotizacion->save();

        $cot_id_prod = $request->get('cot_id_prod');
        $cot_cant = $request->get('cot_cant');
        (new Cotizacion())->agregarProductosCotizacion('Guardar', $cotizacion, $cot_id_prod, $cot_cant);

        return redirect()->route('cotizacion.create')->withStatus(__('Cotización creada exitosamente.'));
        // Puede también redirigir a index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Cotizacion $cotizacion)
    {
        return view('cotizaciones.show', ['cotizacion' => $cotizacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Cotizacion $cotizacion)
    {
        $clientes = Cliente::orderBy('cli_nombre')->get();
        $productos = Producto::where('prod_cantidad', '>=', 1)->orderBy('prod_nombre')->get();
        return view('cotizaciones.edit',  ['cotizacion' => $cotizacion, 'clientes' => $clientes, 'productos' => $productos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        //dd($request);
        $cotizacion->cot_codigo = '00025'; // Cambiar
        $cotizacion->cliente_id = $request->cot_cliente_id;
        $cotizacion->cot_descripcion = $request->cot_descripcion;
        $cotizacion->cot_estado = 'Estado'; // cambiar
        $cotizacion->cot_sumas = $request->input_cot_sumas;
        $cotizacion->cot_iva = $request->input_cot_iva;
        $cotizacion->cot_subtotal = $request->input_cot_subtotal;
        $cotizacion->cot_retencion = $request->input_cot_retencion;
        $cotizacion->cot_total = $request->input_cot_total;
        $cotizacion->save();

        $cot_id_prod = $request->get('cot_id_prod');
        $cot_cant = $request->get('cot_cant');
        (new Cotizacion())->agregarProductosCotizacion('Actualizar', $cotizacion, $cot_id_prod, $cot_cant);

        return redirect()->route('cotizacion.edit', $cotizacion)->withStatus(__('Cotización editada exitosamente.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Cotizacion $cotizacion)
    {
        //dd('delete');
        $cotizacion->delete();
        return redirect()->route('cotizacion.index');
    }
}
