@extends('layouts.admin')

@section('content') 
    <div class="card">
        <div class="card-header">
            <h1>Registro de usuarios</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                    <tr>
                        <td >{{ $item->id }}</td>
                        <td> {{ $item->name. ''.$item->lname  }}</td>
                        <td >{{ $item->email }}</td>
                        <td>{{$item->phone}}</td>
                        <td >
                            <a href="{{url('view-user/'.$item->id)}}" class="btn btn-primary btn-sm">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection