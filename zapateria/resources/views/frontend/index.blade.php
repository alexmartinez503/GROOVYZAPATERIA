@extends('layouts.frontend')

@section('title')
Bienvenido a Grooby Zapateria
@endsection 

@section('content')
@include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <hr>
                <h2>Productos futuros</h2>
                <hr><hr>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($feature_products as $prod)
                            <div class="item">
                                <div class="card">
                                    <img src="{{asset('assets/uploads/products/'.$prod->image)}}" class="w-100" width="200px" height="300px"  alt="imagen del producto">
                                    <div class="card-body">
                                        <h5>{{$prod->name}}</h5>
                                        <span class="float-start">{{$prod->selling_price}}</span>
                                        <span class="float-end"><s> {{$prod->original_price}}</s></span>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
               
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <hr>
                <h2>Categorias en Tendencia</h2>
                <hr><hr>
                <div class="owl-carousel featured-carousel owl-theme">  
                @foreach($trending_category as $tcategory)
                        <div class="item">
                            <div class="card">
                                <a href="{{url('view-category/'.$tcategory->slug)}}">
                                    <img src="{{asset('assets/uploads/category/'.$tcategory->image)}}"class="w-100" width="200px" height="300px"  alt="imagen del producto">
                                    <div class="card-body">
                                        <h5>{{$tcategory->name}}</h5>
                                        <p>
                                            {{$tcategory->description}}
                                        </p>
                                        
                                    </div>
                                    
                                </a>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
            
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    });
</script>
@endsection