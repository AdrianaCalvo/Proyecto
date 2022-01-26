@extends('layout.base')
@section('content')
<div class="card p-2 m-2">
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('message')}}
    </div>
    @endif
</div>


<div class="container mt-5 card mb-5 p-5">
    <div class="row mt-5 mb-3">
        <div class="col-2">
            <a href="{{ route('createProduct')}}" class="btn btn-primary">Crear Producto</a>
        </div>
        <div class="col-3">
            <a href="{{ url('list-sale')}}" class="btn btn-danger">Historial de ventas</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Referencia</th>
                <th scope="col">Precio</th>
                <th scope="col">Peso</th>
                <th scope="col">Categoria</th>
                <th scope="col">Stock</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <th scope="row">{{$producto->id}}</th>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->referencia}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->peso}}</td>
                <td>{{$producto->categoria}}</td>
                <td>{{$producto->stock}}</td>
                <td>
                    <div class="row">
                        <div class="col-3">
                            <form method="POST" name="editar-{{$producto->id}}" action="{{ route('saleProduct') }}">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{$producto->id}}">
                                <button type="submit"  class="btn btn-success " >Vender</button>
                            </form>
                        </div>

                        <div class="col-3">
                            <form method="POST" name="editar-{{$producto->id}}" action="{{ route('editProduct') }}">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{$producto->id}}">
                                <button type="submit"  class="btn btn-primary " >Editar</button>
                            </form>
                        </div>  
                        <div class="col-3">
                            <form method="POST" name="eliminar-{{$producto->id}}" action="{{ route('destroyProduct') }}">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{$producto->id}}">
                                <button type="submit"  class="btn btn-danger " >Eliminar</button>
                            </form>
                        </div>                                      
                    </div>

                </td>
            </tr>
            @endforeach
    </tbody>
    </table> 
</div>

@endsection