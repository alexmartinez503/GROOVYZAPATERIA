@extends('layouts.admin')

@section('content') 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalles de Usuario
                            <a href="{{url('users')}}" class="btn btn-primary float-end">Atras</a>
                        </h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="">Rol</label>
                                <div class="p-2 border">{{$users->role_as == '0'? 'Usuario': 'Administrador'}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Primer Nombre</label>
                                <div class="p-2 border">{{$users->name}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Segundo Nombre</label>
                                <div class="p-2 border">{{$users->lname}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Correo</label>
                                <div class="p-2 border">{{$users->email}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">  Telefono</label>
                                <div class="p-2 border">{{$users->phone}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Direccion</label>
                                <div class="p-2 border">{{$users->address}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Ciudad</label>
                                <div class="p-2 border">{{$users->city}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Departamento</label>
                                <div class="p-2 border">{{$users->state}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Codigo PIN</label>
                                <div class="p-2 border">{{$users->pincode}}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection