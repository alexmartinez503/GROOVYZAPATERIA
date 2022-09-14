@extends('layouts.admin')

@section('content') 
    <div class="card">
        <div class="card-header">
            <h1>pagina de categorias</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                    <tr>
                        <td >{{ $item->id }}</td>
                        <td> {{ $item->name }}</td>
                        <td >{{ $item->description }}</td>
                        <td >
                           <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="cate-image" alt="image here"> 
                        </td>
                        <td >
                            <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary">Editar</a>
                            <a href="{{url('delete-category/'.$item->id )}}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection