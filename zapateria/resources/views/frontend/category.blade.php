@extends('layouts.frontend')

@section('title')
Categorias
@endsection 

@section('content')
@include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Todas las Categorias</h2>
                    <div class="row">
                        <div class="owl-carousel featured-carousel owl-theme">  
                            @foreach($category as $cate)
                                <div class="item">
                                    <a href="{{url('view-category/'.$cate->slug)}}">
                                        <div class="card">
                                            <img src="{{asset('assets/uploads/category/'.$cate->image)}}" width="200px" height="300px"  class="w-100" alt="imagen de categorias">
                                            <div class="card-body">
                                                <h5>{{$cate->name}}</h5>
                                                <p>
                                                    {{$cate->description}}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
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