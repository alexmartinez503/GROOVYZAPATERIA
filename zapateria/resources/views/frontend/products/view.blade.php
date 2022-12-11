@extends('layouts.frontend')

@section('title', $products->name)

@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{url('/add-rating')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$products->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Califica {{$products->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="product_rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="product_rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="product_rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="product_rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
  </div>
</div>



    <div class="py-3 mb-4 shadow-sm  bg-danger  border-top nav-1">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('category')}}"> Colección</a>/
                <a href="{{url('category/'.$products->category->slug)}}"> {{$products->category->name}}</a>/
                <a href="{{url('category/'.$products->category->slug.'/'.$products->slug)}}">  {{$products->name}}</a>
                 
                </h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
            <div class="row">
            <div class="col-md-4 border-right">
                <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="w-100" width="300px" height="300px" alt="imagenes de productos">
            </div>
            <div class="col-md-8">
                <h2 class="mb-0">
                    {{$products->name}}
                    @if($products->trending== '1' )
                        <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Tendencia</label>
                    @endif
                </h2>

                <hr>
                <label class="me-3">Precio Original: <s> Rs {{$products->original_price}}</s></label>
                <label class="fw-bold">Precio de venta: Rs {{$products->selling_price}}</label>
                <p class="mt-3">
                    {!! $products->smal_description !!}
                </p>
                <hr>
                @if($products->qty>0)
                    <label class="badge bg-success">En venta</label>
                @else
                    <label class="badge bg-danger">Agotado</label>
                @endif

                <div class="row mt-2">
                    <div class="col-md-3">
                        <input type="hidden" value="{{$products->id}}" class="prod_id">
                        <label for="Quantity">Cantidad</label>
                        <div class="input-group text-center mb-3">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <br>
                        @if($products->qty>0)
                            <button type="button" class="btn btn-primary me-3 addToCardBtn float-start">Añadir a carrito <i class="fa fa-shopping-cart"></i></button>
                        @endif
                        <button type="button" class="btn btn-success me-3 addToWishlist float-start">Añadir a deseos <i class="fa fa-heart"></i></button>
                    </div>
                </div>


                    </div>
                </div>

                <hr>
                <div class="col-md-12">
                    <h3>Descripcion</h3>
                    <p class="mt-3">{!!$products->description!!}</p>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Califica este producto
                    </button>
                    

                </div>
            </div>
        </div>
    </div>
    <style>
        .nav-1{
            margin-top: 140px;
        }
    </style>
@endsection
