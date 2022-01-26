@extends('layout.base')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Error! </strong> Revise las validaciones de los campos.<br><br>
    </div>
@endif
<div class="container mt-3 p-5 card">
<h2>Crear productos</h2>
    <form method="POST" action="{{ route('storeProduct') }}">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label for="referencia" class="form-label">Referencia</label>
            <input type="text" class="form-control" id="referencia" name="referencia">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio">
        </div>  
        <div class="mb-3">
            <label for="peso" class="form-label">Peso</label>
            <input type="text" class="form-control" id="peso" name="peso">
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria">
        </div>            
        <div class="mb-3">
            <label for="stock" class="form-label">stock</label>
            <input type="text" class="form-control" id="stock" name="stock">
        </div>    
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
