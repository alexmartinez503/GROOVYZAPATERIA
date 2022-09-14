@extends('layouts.admin')

@section('content') 
    <div class="card">
        <div class="card-header">
        <h1>Editar o actualizar categorias</h1>
        </div>
        <div class="card-body">
            <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nombre</label>
                        <input type="text" value="{{ $category->name }}" class="form-control" name="name" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Ficha</label>
                        <input type="text"  value="{{ $category->slug }}"  class="form-control" name="slug" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descripción</label>
                        <textarea name="description" rows="3" class="form-control" > {{ $category->description }} </textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Estado</label>
                        <input type="checkbox" name="status" {{$category->status == "1" ? 'checked':''}} >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" {{$category->popular == "1" ? 'checked':''}} name="popular" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Metatítulo</label>
                        <input type="text" value="{{$category->meta_title }}" class="form-control" name="meta_title" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Palablas clave</label>
                        <textarea name="meta_keywords" rows="3" class="form-control" > {{ $category->meta_keywords }} </textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Metadescripción</label>
                        <textarea name="meta_description" rows="3" class="form-control" > {{ $category->meta_descrip }} </textarea>
                    </div>

                    @if($category->image)
                        <img src="{{asset('assets/uploads/category/'.$category->image)}}" class="w-100" name="image" alt="imagen de categoria">

                    @endif
                    <div class="col-md-12 ">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{url('/categories')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

  
    <br>
@endsection