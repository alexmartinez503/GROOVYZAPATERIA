@extends('layouts.frontend')

@section('title')
{{$category->name}}
@endsection 

@section('content')

    <div class="py-3 mb-4  shadow-sm  bg-danger  border-top nav-1">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('category')}}"> Colección</a>/
                <a href="{{url('category/'.$category->slug)}}"> {{$category->name}}</a> 
           </h6>
        </div>
    </div>
<div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{$category->name}}</h2>
                    @foreach($products as $prod)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <a href="{{url('category/'.$category->slug.'/'.$prod->slug)}}">
                                    <img src="{{asset('assets/uploads/products/'.$prod->image)}}" class="w-100" width="200px" height="300px"   alt="imagen del producto">
                                    <div class="card-body">
                                        <h5>{{$prod->name}}</h5>
                                        <span class="float-start">{{$prod->selling_price}}</span>
                                        <span class="float-end"><s> {{$prod->original_price}}</s></span>
                                    </div>
                                    </a>
                                </div>
                            </div>
                    @endforeach
               
               
            </div>
        </div>
    </div>

    <style>
        .nav-1{
            margin-top: 140px;
        }
    </style>
@endsection 