@extends('layouts.frontend')

@section('title')
 Verificar
@endsection 

@section('content')
    <div class="container  mt-5">
        <form action="{{url('place-order')}}" method="POST">
            {{csrf_field()}}
        <div class="row c1">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h5>Detalles basicos</h5>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">Primer Nombre</label>
                                <input type="text" require class="form-control firstname" value="{{Auth::user()->name }}" name="fname" placeholder="Ingrese el primer nombre">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Segundo Nombre</label>
                                <input type="text" require class="form-control lastname" value="{{Auth::user()->lname }}" name="lname" placeholder="Ingrese el segundo nombre">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Correo</label>
                                <input type="text" require class="form-control email" value="{{Auth::user()->email }}" name="email" placeholder="Ingrese su correo">
                                <span id="email_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Numero de telefono</label>
                                <input type="text" require class="form-control phone" value="{{Auth::user()->phone }}" name="phone" placeholder="Ingrese su numero telefonico">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Dirección </label>
                                <input type="text" require class="form-control address" value="{{Auth::user()->address }}" name="address" placeholder="Ingrese su direccion">
                                <span id="address_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Ciudad</label>
                                <input type="text" require class="form-control city" value="{{Auth::user()->city }}" name="city" placeholder="Ingrese su ciudad">
                                <span id="city_error" class="text-danger"></span>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Departamento</label>
                                <input type="text" require class="form-control state" value="{{Auth::user()->state }}" name="state" placeholder="Ingrese su departamento ">
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Codigo PIN</label>
                                <input type="text" require class="form-control pincode" value="{{Auth::user()->pincode }}" name="pincode" placeholder="Ingrese su codigo">
                                <span id="pincode_error" class="text-danger"></span>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Otros detalles</h6>
                        <hr>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $total = 0 @endphp 
                            @foreach($cartitems as $item)

                                <tr>
                                    @php   $total +=($item->products->selling_price * $item->prod_qty) @endphp 
                                    <td> {{$item->products->name}}</td>
                                    <td>{{$item->prod_qty}}</td>
                                    <td>{{$item->products->selling_price}}</td>
                                   
                                </tr>
                          
                            @endforeach
                           
                            </tbody>
                        </table>
                        <h6 class="px-2"> Total a Pagar <span class="float-end">${{$total}}</span></h6>
                        <hr>
                        <input type="hidden" name="payment_mode" id="COD">
                        <button type="submit" class="btn btn-success btnPedido w-100">Realizar Pedido</button>
                        <!--<button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pagar con Razorpay</button>-->
                        <div id="paypal-button-container" class="mt-2"></div>

                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <style>
        .c1{
            margin-top: 140px;
        }
    </style>
@endsection

@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=Afxl3II6szb72NKCqXFZ5IusgTRc0f0SCAto0KoNxB0iQZCSWmfOhAFBE0CC6ZCKH0OiSQMDJuV_gC0P"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '0.01' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(details) {
           //alert('Transaction complete by ' + details.payer.name.given_name);

            var firstname = $('.firstname').val();
            var lastname = $('.lastname').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var address = $('.address').val();
            var city = $('.city').val();
            var state = $('.state').val();
            var pincode = $('.pincode').val();



           $.ajax({
            method:"POST",
            url: "/place-order ",
            data:{
                'firstname':firstname,
                'lastname' :lastname ,
                'email'  :email ,
                'phone'  :phone ,
                'address' :address ,
                'city' :city,
                'state'  :state ,
                'pincode' :pincode,
                'payment_mode':"Paid by Paypal",
                'payment_id': details.id,
            },
            success: function (response){
             swal(response.status);
             window.location.href= "/my-orders"
            }
        });
          });
        }
      }).render('#paypal-button-container');
    </script>
@endsection 