<?php

namespace App\Http\Controllers;

use App\model\Ventas;
use App\model\Producto;
use Illuminate\Http\Request;
Use Session;

class VentasController extends Controller
{

    public function index(){
        $modelVentas = new Ventas();
        $ventas = $modelVentas->list();
        return view('sales.index',compact('ventas'));
    }

    /**
     *  Formulario con la descripcion de la venta 
     *  registrando la cantidad de compra de ese producto.
    **/
    public function saleOfProducts(Request $request){
        $id = $request->input('id');
        $producto = Producto::find($id);
        return view('product.sale',compact('producto'));
    }

    /**
     *   Se realiza el registro de venta y se resta en el stock
    **/
    public function saveSaleOfProducts(Request $request){
        $id   = $request->input('id');
        $data = $request->all();
        $producto = Producto::find($id);
        $venta    = new Ventas();

        if($this->voidEvaluateStock($producto,$data)){
            $producto->saveSaleOfProduct($data);
            $venta->saveData($data);
        }
        return redirect()->route('indexProduct');
    }

    /** 
     *      Se valida la disponibilidad del producto en stock 
     *      y se muestra un mensaje al usuario.
     */
    public function voidEvaluateStock(Producto $producto , $request){
        if($producto->stock < $request['cantidad-solicitada']){
            Session::flash('message','Stock no disponible'); 
            return false;
        }
        return true;

    }
}
