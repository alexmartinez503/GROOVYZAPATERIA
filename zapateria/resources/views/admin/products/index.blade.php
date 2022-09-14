@extends('layouts.admin')

@section('content') 
    <div class="card">
        <div class="card-header">
            <h1>pagina de productos</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio de venta</th>
                        <th>Imagen</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                    <tr>
                        <td >{{ $item->id }}</td>
                        <td >{{ $item->category->name }}</td>
                        <td> {{ $item->name }}</td>
                        <td >{{ $item->description }}</td>
                        <td>{{$item->selling_price}}</td>
                        <td >
                           <img src="{{asset('assets/uploads/products/'.$item->image)}}" class="cate-image" alt="image here"> 
                        </td>
                        <td >
                            <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary btn-sm">Editar</a>
                            <a href="{{url('delete-product/'.$item->id )}}" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection