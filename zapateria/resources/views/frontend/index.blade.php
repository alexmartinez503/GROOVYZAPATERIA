@extends('layouts.frontend')

@section('title')
Bienvenido a Grooby Zapateria
@endsection 

@section('content')
@include('layouts.inc.slider')

   
    <!-- Caracteristicas -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                
                <h2>Productos futuros</h2>
                <br>
                <!-- C#1 -->
                <div class=" owl-carousel featured-carousel owl-theme">
                    @foreach($feature_products as $prod)
                        <div class="single-features">
                            <div class="f-icon">
                                <img src="{{asset('assets/uploads/products/'.$prod->image)}}" class="w-100" width="200px" height="300px"  alt="imagen del producto">
                            </div>
                            <h5>{{$prod->name}}</h5>
                            <span class="float-start">{{$prod->selling_price}}</span>
                            <span class="float-end"><s> {{$prod->original_price}}</s></span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="features-area section_gap py-1">
        <div class="container">
            <div class="row features-inner">
                
                <h2>Categorias en Tendencia</h2>
                <br>
                <div class="owl-carousel featured-carousel owl-theme">  
                    @foreach($trending_category as $tcategory)
                        <div class="single-features">
                            <div class="f-icon">
                            <a href="{{url('view-category/'.$tcategory->slug)}}"> 
                                <img src="{{asset('assets/uploads/category/'.$tcategory->image)}}"class="w-100" width="200px" height="300px"  alt="imagen del producto"> </a>
                            </div>
                                <h5>{{$tcategory->name}}</h5>
                                <p>
                                    {{$tcategory->description}}
                                </p>
                        </div>
                        
                    @endforeach
                </div>
            
            </div>
        </div>
    </section>

     <!-- Categoria / Galeria -->
     <section class="category-area py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="{{asset('assets/img/category/c1.jpg')}}" alt="">
                                    <a href="{{url('view-category/'.$tcategory->slug)}}" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Calzado para deportistas</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="{{asset('assets/img/category/c2.jpg')}}" alt="">
                                    <a href="{{url('view-category/'.$tcategory->slug)}}" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Productos de gran calidad</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="{{asset('assets/img/category/c3.jpg')}}" alt="">
                                    <a href="img/category/c3.jpg" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Productos de gran calidad</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8">
                                <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="{{asset('assets/img/category/c4.jpg')}}" alt="">
                                    <a href="{{asset('assets/img/category/c4.jpg')}}" class="img-pop-up" target="_blank">
                                        <div class="deal-details">
                                            <h6 class="deal-title">Calzado para deportistas</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{asset('assets/img/category/c5.jpg')}}" alt="">
                            <a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Calzado paa deportistas</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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