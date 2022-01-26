@extends('layout.base')
@section('content')


<div class="container mt-5 card mb-5 p-5">
    <div class="row mt-5 mb-3">
        <div class="col-2">
            <a href="{{ route('indexProduct')}}" class="btn btn-primary">Listado de Producto</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre Producto</th>
                <th scope="col">Referencia</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad vendida</th>
                <th scope="col">Fecha de venta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <th scope="row">{{$venta->id}}</th>
                <td>{{$venta->nombre}}</td>
                <td>{{$venta->referencia}}</td>
                <td>{{$venta->precio}}</td>
                <td>{{$venta->quantity_sale}}</td>
                <td>{{$venta->created_at}}</td>
            </tr>
            @endforeach
    </tbody>
    </table> 
</div>

@endsection