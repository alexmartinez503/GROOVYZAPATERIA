@extends('layouts.admin')

@section('content') 
    <div class="card">
        <div class="card-header">
        <h1>Editar o Actualizar Productos</h1>
        </div>
        <div class="card-body">
            <form action="{{url('uptade-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Categoria</label>
                    <select class="form-select">
                        <option value="">{{$products->category->name}}</option>
                
                       
                    </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" value="{{$products->name}}" name="name" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Ficha</label>
                        <input type="text" class="form-control" value="{{$products->slug}}" name="slug" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Pequeña Descripción</label>
                        <textarea name="small_description" rows="3" class="form-control" >{{$products->smal_description}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descripción</label>
                        <textarea name="description" rows="3" class="form-control" >{{$products->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Precio Original</label>
                        <input type="number" name="original_price" value="{{$products->original_price}}" class="form-control" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Precio de Venta</label>
                        <input type="number" name="selling_price" value="{{$products->selling_price}}" class="form-control" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Impuesto</label>
                        <input type="number" value="{{$products->tax}}" name="tax" class="form-control" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Cantidad</label>
                        <input type="number" name="qty" value="{{$products->qty}}" class="form-control" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Estado</label>
                        <input type="checkbox" {{$products->status =="1" ? 'checked' : ''}} name="status" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tendencia</label>
                        <input type="checkbox" {{$products->trending =="1" ? 'checked' : ''}} name="trending" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Metatítulo</label>
                        <input type="text" class="form-control"  value="{{$products->meta_title}}"  name="meta_title" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Palabras clave</label>
                        <textarea name="meta_keywords" rows="3"   class="form-control" >{{$products->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Metadescripción</label>
                        <textarea name="meta_description" rows="3"  class="form-control" >{{$products->meta_description}}</textarea>
                    </div>
                    @if($products->image)
                        <img src="{{asset('assets/uploads/products/'.$products->image)}}" name="image" alt="imagen de categoria">

                    @endif
                    <div class="col-md-12 ">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{url('/products')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

  
    <br>
@endsection