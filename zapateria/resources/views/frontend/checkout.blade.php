@extends('layouts.frontend')

@section('title')
 Verificar
@endsection 

@section('content')
    <div class="container  mt-5">
        <form action="{{url('place-order')}}" method="POST">
            {{csrf_field()}}
        <div class="row c1">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h5>Detalles basicos</h5>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">Primer Nombre</label>
                                <input type="text" class="form-control" value="{{Auth::user()->name }}" name="fname" placeholder="Ingrese el primer nombre">
                            </div>
                            <div class="col-md-6">
                                <label for="">Segundo Nombre</label>
                                <input type="text" class="form-control" value="{{Auth::user()->lname }}" name="lname" placeholder="Ingrese el segundo nombre">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Correo</label>
                                <input type="text" class="form-control" value="{{Auth::user()->email }}" name="email" placeholder="Ingrese su correo">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Numero de telefono</label>
                                <input type="text" class="form-control" value="{{Auth::user()->phone }}" name="phone" placeholder="Ingrese su numero telefonico">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Dirección </label>
                                <input type="text" class="form-control" value="{{Auth::user()->address }}" name="address" placeholder="Ingrese su direccion">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Ciudad</label>
                                <input type="text" class="form-control" value="{{Auth::user()->city }}" name="city" placeholder="Ingrese su ciudad">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Departamento</label>
                                <input type="text" class="form-control" value="{{Auth::user()->state }}" name="state" placeholder="Ingrese su departamento ">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Codigo PIN</label>
                                <input type="text" class="form-control" value="{{Auth::user()->pincode }}" name="pincode" placeholder="Ingrese su codigo">
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Otros detalles</h6>
                        <hr>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cartitems as $item)

                                <tr>
                                    <td> {{$item->products->name}}</td>
                                    <td>{{$item->prod_qty}}</td>
                                    <td>{{$item->products->selling_price}}</td>
                                   
                                </tr>
                          
                            @endforeach
                           
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary btnPedido w-100">Realizar Pedido</button>
                  

                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <style>
        .c1{
            margin-top: 140px;
        }
    </style>
@endsection