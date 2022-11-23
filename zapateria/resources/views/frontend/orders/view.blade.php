@extends('layouts.frontend')

@section('title')
Mis Ordenes
@endsection 

@section('content')

    <div class="container mt-5">
        <div class="row details1 ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4>Vista de ordenes
                        <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">Atras</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Detalles de Envio
                                   
                                </h4>
                                <hr>
                                <label for="">Primer Nombre</label>
                                <div class="border ">{{$orders->fname}}</div>
                                <label for="">Segundo Nombre</label>
                                <div class="border">{{$orders->lname}}</div>
                                <label for="">Email</label>
                                <div class="border">{{$orders->email}}</div>
                                <label for="">No. de contacto</label>
                                <div class="border">{{$orders->phone}}</div>
                                <label for="">Direccion de envio</label>
                                <div class="border">
                                    {{$orders->address}}
                                    {{$orders->city}}
                                    {{$orders->state}}
                                </div>

                                <label for="">Codigo Postal</label>
                                <div class="border">{{$orders->pincode}}</div>

                            </div>
                            <div class="col-md-6">

                            <h4>Detalles de Ordenes</h4>
                            <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Imagen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders->orderitems as $item)
                                            
                                                <tr>
                            
                                                    <td>{{$item->products->name}}</td>
                                                    <td>{{$item->qty}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td>
                                                        <img src="{{ asset('assets/uploads/products/'.$item->products->image)  }}" width="60px" alt="Imagen de producto">
                                                       
                                                    </td>



                                                </tr>

                                            @endforeach
                                        </tbody>

                                    </table>

                                    <h4 class="px-2">Total a Pagar <span class="float-end"></span> </h4>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .details1 {
            margin-top: 140px;
        }
    </style>
@endsection 