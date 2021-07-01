<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Empaque;
use App\Models\Medida;
use App\Models\Producto;
use App\Models\Material;
use App\Models\Categoria;
use App\Models\MaterialProducto;
use Illuminate\Http\Request;
use DB;

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
        $categorias = Categoria::all();
        $medidas = Medida::all();
        $empaques = Empaque::all();
        $productos = Producto::with('materiales')->get();
        return view('productos.index', compact('productos', 'categorias', 'medidas', 'empaques'));
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
        $medidas = Medida::all();
        $empaques = Empaque::all();
        return view('productos.create', compact('materiales', 'categorias', 'medidas', 'empaques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductoRequest $request)
    {
        //dd($request);

        $producto = new Producto();
        $producto->prod_codigo      = $request->prod_codigo;
        $producto->prod_nombre      = $request->prod_nombre;
        $producto->prod_cantidad    = $request->prod_cantidad;
        $producto->prod_precio      = $request->prod_precio;
        $producto->prod_desc        = $request->prod_descripcion;
        $producto->categoria_id     = $request->categoria_id;
        $producto->medida_id     = $request->prod_medida;
        $producto->empaque_id     = $request->prod_empaque;
        $producto->prod_contenido     = $request->prod_contenido;
        $producto->prod_procedimiento     = $request->prod_proced;
        $producto->save();

        /*foreach($request->mat_cantidad as $k => $material) {
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

        }*/
        return redirect()->route('producto.index') ->with('success','Registro editado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto= Producto::find($id);
        $producto->materiales;
        $producto->categoria;
        foreach($producto->materiales as $material)
            $material->material;
        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materiales = Material::all();
        $categorias = Categoria::all();
        $medidas = Medida::all();
        $empaques = Empaque::all();
        $producto = Producto::findOrFail($id);
        // dd($productos);
        return view('productos.edit', compact('materiales', 'categorias', 'producto',
            'medidas', 'empaques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductoRequest $request, $id)
    {
        //dd($request);
        $producto = Producto::find($id);
        $producto->prod_codigo      = $request->prod_codigo;
        $producto->prod_nombre      = $request->prod_nombre;
        $producto->prod_cantidad    = $request->prod_cantidad;
        $producto->prod_precio      = $request->prod_precio;
        $producto->prod_desc        = $request->prod_descripcion;
        $producto->categoria_id     = $request->categoria_id;
        $producto->medida_id     = $request->prod_medida;
        $producto->empaque_id     = $request->prod_empaque;
        $producto->prod_contenido     = $request->prod_contenido;
        $producto->prod_procedimiento     = $request->prod_proced;
        $producto->save();

        /*foreach($request->mat_cantidad as $k => $material) {
            if(isset($material) || (int) $material > 0){
                echo "->".$request->mat_cantidad[$k];
                //Para nueva materia prima agregada
                if(MaterialProducto::where('material_id',$request->mat_id[$k])->where('producto_id',$producto->id)->count()<1){
                    $materialProducto = new MaterialProducto;
                    $materialProducto->mat_prod_cantidad    = $request->mat_cantidad[$k];
                    $materialProducto->material_id          = $request->mat_id[$k];
                    $materialProducto->producto_id          = $producto->id;
                    $materialProducto->save();

                    $actual = $materialProducto->material->mat_cantidad;
                    $materialProducto->material->mat_cantidad = $actual-$materialProducto->mat_prod_cantidad;
                    $materialProducto->material->save();
                }else{
                    //Para materia prima editada se saca la diferencia para descontarla o sumarla al inventario ya que anteriormente solo se descuenta lo inicial
                    $materialProducto=MaterialProducto::where('material_id',$request->mat_id[$k])->where('producto_id',$producto->id)->get()->first();
                    $actual = $materialProducto->material->mat_cantidad;
                    if($materialProducto->mat_prod_cantidad!=$request->mat_cantidad[$k]){
                        $diferencia=$materialProducto->mat_prod_cantidad-$request->mat_cantidad[$k];
                        $materialProducto->material->mat_cantidad = $actual+$diferencia;
                        $materialProducto->material->save();
                        $materialProducto->mat_prod_cantidad=$request->mat_cantidad[$k];
                        $materialProducto->save();
                    }
                }
            }else{
                //Para materia prima eliminada al editar
                if(MaterialProducto::where('material_id',$request->mat_id[$k])->where('producto_id',$producto->id)->count()>0){
                    $materialProducto=MaterialProducto::where('material_id',$request->mat_id[$k])->where('producto_id',$producto->id)->get()->first();
                    $actual = $materialProducto->material->mat_cantidad;
                    $materialProducto->material->mat_cantidad = $actual+$materialProducto->mat_prod_cantidad;
                    $materialProducto->material->save();
                    $materialProducto->delete();
                }
            }
        }*/
        return redirect()->route('producto.index') ->with('success','Registro editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        DB::beginTransaction();
        try{
            foreach($producto->materiales as $materia){
                $actual = $materia->material->mat_cantidad;
                $materia->material->mat_cantidad = $actual + $materia->mat_prod_cantidad;
                $materia->material->save();

                $materia->delete();
            }
            $producto->delete();
            DB::commit();
            return redirect()->route('producto.index')->with('success','Registro eliminado exitosamente.');
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('producto.index')->with('error','El registro no pudo eliminarse.');
        }
    }
}
