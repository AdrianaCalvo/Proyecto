<?php

namespace App\Http\Controllers;

use App\model\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\productRequest;
use App\Http\Requests\editProductRequest;
Use Session;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('product.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productRequest $request)
    {
        $producto = new Producto();
        $producto->saveData($request->all());
        return redirect()->route('indexProduct');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $ModelProducto = new Producto();
        $producto = $ModelProducto->find($id);
        return view('product.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(editProductRequest $request)
    {
        $producto = new Producto();
        $producto->updateData($request->all());

        return redirect()->route('indexProduct');
    }

    /**
     *  Metodo Eliminar producto
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('indexProduct');
    }


  
}
