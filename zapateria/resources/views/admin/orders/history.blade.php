@extends('layouts.admin')

@section('tittle') 
    Orders
@endsection

@section('content') 
   <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <h4>Historial de Ordenes
                            <a href="{{'orders'}}" class="btn btn-warning float-end">Nuevas ordenes</a>
                        </h4>
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
                                            <a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary">Ver </a>
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

   
@endsection