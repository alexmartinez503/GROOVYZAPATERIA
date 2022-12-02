@extends('layouts.frontend')

@section('title')
Lista de Deseos
@endsection 

@section('content')
    <div class="py-3 mb-4 shadow-sm  bg-danger  border-top nav-1">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}"> Inicio</a>/
                <a href="{{url('wishlist')}}">Lista de Deseos</a>
            </h6>
        </div>
    </div>


    <div class="container my-5">
        <div class="card shadow ">
            <div class="card-body">
                @if($wishlists->count()>0)
                    @foreach($wishlists as $item) 
                        <div class="row product_data">
                            <div class="col-md-2 my-auto">
                                <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" height="70px" width="70px" alt="image">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{$item->products->name}}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>${{$item->products->selling_price}}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                    <input type="hidden" value="{{$item->prod_id}}" class="prod_id">
                                    @if($item->products->qty >= $item->prod_qty)
                                        <label for="Quantity">Cantidad</label>
                                        <div class="input-group text-center mb-3" style="width: 130px;">
                                            <button class="input-group-text  decrement-btn">-</button>
                                            <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                            <button class="input-group-text  increment-btn">+</button>
                                        </div> 
                                  
                                    @else
                                        <h6>Agotado</h6>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-success addToCardBtn "> <i class="fa fa-shopping-cart"></i> Agregar a carrito</button>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger remove-wishlist-item"> <i class="fa fa-trash"></i> Remover</button>
                            </div>
                        </div>
                        
                    @endforeach

                @else
                    <h4>No hay productos en su lista de deseos</h4>
                @endif
            </div>
        </div>
    </div>

    <style>
        .nav-1{
            margin-top: 140px;
        }
    </style>
   
@endsection 
