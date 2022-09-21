@extends('layouts.frontend')

@section('title', $products->name)

@section('content')
    <div class="py-3 mb-4 shadow-sm  bg-danger  border-top">
        <div class="container">
            <h6 class="mb-0">Colección / {{$products->category->name}} / {{$products->name}}</h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow">
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
                    <div class="col-md-2">
                        <label for="Quantity">Cantidad</label>
                        <div class="input-group text-center mb-3">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <br>
                        <button type="button" class="btn btn-success me-3 float-start">Añadir a deseos <i class="fa fa-heart"></i></button>
                        <button type="button" class="btn btn-primary me-3 float-start">Añadir a carrito <i class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>


                    </div>
                </div>

                <hr>
                <div class="col-md-12">
                    <h3>Descripcion</h3>
                    <p class="mt-3">{!!$products->description!!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.increment-btn').click(function(e){
            e.preventDefault();

            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                $('.qty-input').val(value)
            }
        });

        $('.decrement-btn').click(function(e){
            e.preventDefault();

            var dec_value = $('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $('.qty-input').val(value)
            }
        });
    })
</script>
@endsection