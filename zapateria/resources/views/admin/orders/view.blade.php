@extends('layouts.admin')

@section('title')
Mis Ordenes
@endsection 

@section('content')

    <div class="container mt-1">
        <div class="row details1 ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4>Vista de ordenes
                        <a href="{{url('orders')}}" class="btn btn-warning text-white float-end">Atras</a>
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
                                        @php $total = 0 @endphp 
                                            @foreach($orders->orderitems as $item)
                                            
                                                <tr>
                                                    @php   $total +=($item->products->selling_price * $item->qty) @endphp  
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

                                    <h4 class="px-2">Total a Pagar <span class="float-end">${{$total}}</span> </h4>

                                    <div class="mt-5 px-2">
                                    <label for="">Estado del pedido</label>
                                        <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select class="form-select" name="order_status">
                                                <option {{ $orders->status == '0'? 'selected': ''}} value="0">pendiente</option>
                                                <option {{ $orders->status == '1'? 'selected': ''}} value="1">completado</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary mt-3 float-end" >Actualizar</button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection 