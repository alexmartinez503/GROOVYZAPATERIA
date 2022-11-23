@extends('layouts.frontend')

@section('title')
Mis Ordenes
@endsection 

@section('content')

    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Mis ordenes</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>fecha</th>
                                    <th>Numero de rastreo</th>
                                    <th>Precio total</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                
                                    <tr>
                                        <td>{{date('d-m-y', strtotime($item->created_at))}}</td>
                                        <td>{{$item->tracking_no}}</td>
                                        <td>{{$item->total_price}}</td>
                                        <td>{{$item->status == '0' ? 'pendiente' : 'completado'}}</td>
                                        <td>
                                            <a href="{{url('view-order/'.$item->id)}}" class="btn btn-primary">Ver </a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .row{
            margin-top: 140px;
        }
    </style>
@endsection 