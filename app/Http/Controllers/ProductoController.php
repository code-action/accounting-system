<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Material;
use App\Models\Categoria;
use App\Models\MaterialProducto;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::with('materiales')->get();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiales = Material::all();
        $categorias = Categoria::all();
        return view('productos.create', compact('materiales', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $producto = new Producto;
        $producto->prod_nombre      = $request->prod_nombre;
        $producto->prod_cantidad    = $request->prod_cantidad;
        $producto->prod_precio      = $request->prod_precio;
        $producto->prod_desc        = $request->prod_desc;
        $producto->categoria_id     = $request->categoria_id;

        $producto->save();

        foreach($request->mat_cantidad as $k => $material) {
            dump($material);
            if(!isset($material) || (int) $material <= 0)
                continue;

            $materialProducto = new MaterialProducto;
            $materialProducto->mat_prod_cantidad    = $request->mat_cantidad[$k];
            $materialProducto->material_id          = $request->mat_id[$k];
            $materialProducto->producto_id          = $producto->id;
            $materialProducto->save();

            $actual = $materialProducto->material->mat_cantidad;
            $materialProducto->material->mat_cantidad = $actual-$materialProducto->mat_prod_cantidad;
            $materialProducto->material->save();
            
        }
        return redirect()->route('producto.index') ->with('success','Registro editado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}