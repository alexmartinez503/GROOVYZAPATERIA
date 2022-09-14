@extends('layouts.admin')

@section('content') 
    <div class="card">
        <div class="card-header">
        <h1>Añadir categorias</h1>
        </div>
        <div class="card-body ">
            <form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="name" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Ficha</label>
                        <input type="text" class="form-control" name="slug" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descripción</label>
                        <textarea name="description" rows="3" class="form-control" ></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Estado</label>
                        <input type="checkbox" name="status" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Metatítulo</label>
                        <input type="text" class="form-control" name="meta_title" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Palabras clave </label>
                        <textarea name="meta_keywords" rows="3" class="form-control" ></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Metadescripción</label>
                        <textarea name="meta_description" rows="3" class="form-control" ></textarea>
                    </div>
                    <div class="col-md-12 ">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

  
    <br>
@endsection