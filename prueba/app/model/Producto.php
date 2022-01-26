<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use app\model\producto;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $fillable = ['nombre','referencia','precio','peso','categoria','stock'];

    /**
     *  Se guardan los datos.
    **/
    public function saveData($request){
        $this->nombre     = $request['nombre'];
        $this->referencia = $request['referencia'];
        $this->precio     = $request['precio'];
        $this->peso       = $request['peso'];
        $this->categoria  = $request['categoria'];
        $this->stock      = $request['stock'];
        $this->save();
    }


   /**
    *  Actualizacion de los datos.
   **/ 
   public function updateData($request){
        $this->find($request['id'])->update([
            'nombre'     => $request['nombre'],
            'referencia' => $request['referencia'],
            'precio'     => $request['precio'],
            'peso'       => $request['peso'],
            'categoria'  => $request['categoria'],
            'stock'      => $request['stock']
        ]);
   }

   /**
    *  Registro de ventas.
   **/
   public function saveSaleOfProduct($request){
        $producto = $this->find($request['id']);
        $stock    = $producto->stock;
        $producto->stock = (int)$stock - (int)$request['cantidad-solicitada'];
        $producto->save();
    }    



}
