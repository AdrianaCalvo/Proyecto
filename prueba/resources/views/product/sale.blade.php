@extends('layout.base')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Error! </strong> Revise las validaciones de los campos.<br><br>
    </div>
@endif
<div class="container mt-3 p-5 card">
    <h2>Formulario de venta</h2>
    <form method="POST" action="{{ route('SavesaleProduct') }}">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$producto->id}}">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Producto</label>
            <input type="text"  class="form-control" readonly  value="{{$producto->nombre}}" disabled>
        </div>
        <div class="mb-3">
            <label for="referencia" class="form-label">Referencia</label>
            <input type="text" class="form-control" readonly  value="{{$producto->referencia}}" disabled>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" readonly value="{{$producto->precio}}" disabled>
        </div>  
        <div class="mb-3">
            <label for="peso" class="form-label">Peso</label>
            <input type="text" class="form-control" readonly value="{{$producto->peso}}" disabled>
        </div>     
        <div class="mb-3">
            <label for="cantidad-solicitada" class="form-label">Cantidad solicitada</label>
            <input type="number" class="form-control" id="cantidad-solicitada" name="cantidad-solicitada">
        </div>    
        <button type="submit" class="btn btn-primary">Vender</button>
    </form>
</div>
@endsection
