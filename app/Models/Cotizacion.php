<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Scalar\String_;
use SebastianBergmann\Environment\Console;

class Cotizacion extends Model
{
    use HasFactory;
    //cot_estado, cot_fecha, cot_total, cot_descripcion

    protected $table = "cotizacions";

    protected $fillable = [
        'cot_estado',
        'cot_fecha',
        'cot_total',
        'cot_descripcion',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function facturacion()
    {
        return $this->hasOne(Facturacion::class);
    }

    // Relación muchos a muchos
    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot('cot_prod_cantidad', 'cot_prod_preciou');;
    }

    // Agregar productos a una cotización,
    // Recibe: objeto: cotización, array: id productos, array: cantidades de productos
    public function agregarProductosCotizacion(string $action, Cotizacion $cotizacion, array $cot_id_prod, array $cot_cant){
        $out = new \Symfony\Component\Console\Output\ConsoleOutput(); // Imprimir en consola
        $prodCotizacion = [];
        foreach ($cotizacion->productos as $producto){
            array_push($prodCotizacion, $producto->id);
        }

        $cantidades = []; // Diccionario que asocia el id_producto (clave) con la cantidad (valor) que piden de ese producto
        for ($i = 0; $i < sizeof($cot_id_prod); $i++){
            $cantidades[$cot_id_prod[$i]] = $cot_cant[$i];
        }
        //dd($cantidades[4]);

        if ($action == 'Guardar') {
            for ($i = 0; $i < sizeof($cot_id_prod); $i++){
                $producto = Producto::findORFail($cot_id_prod[$i]);
                $cotizacion->productos()->attach($cot_id_prod[$i],
                    ['cot_prod_cantidad' => $cot_cant[$i], 'created_at' => Carbon::now(),
                        'cot_prod_preciou' => $producto->prod_precio, 'cot_prod_total' => $cot_cant[$i]* $producto->prod_precio]);
            }
        } elseif ($action == 'Actualizar') {

            // Si $repiten está vacío es porque se eliminaron lo productos que la cotización tenía antes de editarse
            // Si $repiten contiene algo puede ser que al producto se le modificó su cantidad
            $repiten2 = array_intersect($prodCotizacion, $cot_id_prod); // lo productos que se mantiene en la cotización
            $repiten = []; // Construyendo otro array ya que en $repiten2 la clave no va en orden
            foreach ($repiten2 as $r){
                array_push($repiten, $r);
            }

            // Si está vacío es porque no se eliminó ningún producto de la cotización original
            $eliminados2 = array_diff($prodCotizacion, $cot_id_prod);

            $eliminados = []; // Construyendo otro array ya que en $eliminados2 la clave no va en orden
            foreach ($eliminados2 as $e){
                array_push($eliminados, $e);
            }

            // Si $nuevos está vacío es porque no hay productos nuevos agregados a la cotización
            $nuevos2 = array_diff($cot_id_prod, $prodCotizacion); // nuevos productos entraron a la cotización
            $nuevos = []; // Construyendo otro array ya que en $nuevos2 la clave no va en orden
            foreach ($nuevos2 as $n){
                array_push($nuevos, $n);
            }
            //dd('$repiten', $repiten, '$eliminados', $eliminados, '$nuevos', $nuevos);


            // EDITAR CANTIDADES DE PRODUCTOS QUE AÚN SIGUEN EN LA COTIZACIÓN, SI ES QUE SE HA CAMBIADO
            for($i = 0; $i < sizeof($repiten); $i++){
                //dd($repiten, $i);
                $prod = Producto::findOrFail($repiten[$i]);
                //dd($prod);
                foreach ($cotizacion->productos as $producto){
                    if($producto->id == $repiten[$i]){ // Si son el mismo producto de la cotización original y la nueva
                        if($producto->pivot->cot_prod_cantidad == $cantidades[$repiten[$i]]){ // Verificar si las cantidades cambiaron
                            // No hacer nada
                            $out->writeln("Mismo producto sin cambios" );
                        }else { // La cantidad no es igual hay cambios, entonces actualizamos cantidad
                            $out->writeln("Mismo producto con cambios en la cantidad" );
                            $cotizacion->productos()
                                ->updateExistingPivot($producto->id,
                                    ['cot_prod_cantidad' => $cot_cant[$i], 'cot_prod_preciou' => $producto->prod_precio,
                                        'updated_at' => Carbon::now(),
                                        'cot_prod_total' => $cot_cant[$i] * $producto->prod_precio]);
                        }
                    }

                }
            }

            // AGREGAR NUEVOS PRODUCTOS A LA COTIZACIÓN
            for ($i = 0; $i < sizeof($nuevos); $i++){
                $producto = Producto::findOrFail($nuevos[$i]); // Revisar
                //dd($producto);
                $cotizacion->productos()->attach($nuevos[$i],
                    ['cot_prod_cantidad' => $cantidades[$nuevos[$i]], 'created_at' => Carbon::now(),
                        'cot_prod_preciou' => $producto->prod_precio,
                        'cot_prod_total' => $cot_cant[$i]* $producto->prod_precio]);
            }

            // ELIMINAR PRODUCTOS DE LA COTIZACIÓN ORIGINAL
            $cotizacion->productos()->detach($eliminados);

        }
    }
}
