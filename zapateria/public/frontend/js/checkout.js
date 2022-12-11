$(document).ready(function(){
    $('.razorpay_btn').click(function(e){
        e.preventDefault();

       var firstname = $('.firstname').val();
       var lastname = $('.lastname').val();
       var email = $('.email').val();
       var phone = $('.phone').val();
       var address = $('.address').val();
       var city = $('.city').val();
       var state = $('.state').val();
       var pincode = $('.pincode').val();

       if(!firstname)
       {
        fname_error= "Primer nombre requerido";
        $('#fname_error').html('');
        $('#fname_error').html(fname_error);
       }
       else
       {
        fname_error = "";
        $('#fname_error').html('');
       }

       if(!lastname)
       {
        lname_error= "segundo nombre requerido";
        $('#lname_error').html('');
        $('#lname_error').html(lname_error);
       }
       else
       {
        lname_error = "";
        $('#lname_error').html('');
       }

       if(!email)
       {
        email_error= "Email requerido";
        $('#email_error').html('');
        $('#email_error').html(email_error);
       }
       else
       {
        email_error = "";
        $('#email_error').html('');
       }

       if(!phone)
       {
        phone_error= "Telefono requerido";
        $('#phone_error').html('');
        $('#phone_error').html(phone_error);
       }
       else
       {
        phone_error = "";
        $('#phone_error').html('');
       }

       if(!address)
       {
        address_error= "Direccion requerido";
        $('#address_error').html('');
        $('#address_error').html(address_error);
       }
       else
       {
        address_error = "";
        $('#address_error').html('');
       }

       if(!city)
       {
        city_error= "Ciudad requerido";
        $('#city_error').html('');
        $('#city_error').html(city_error);
       }
       else
       {
        city_error = "";
        $('#city_error').html('');
       }

       if(!state)
       {
        state_error= "Departamento requerido";
        $('#state_error').html('');
        $('#state_error').html(state_error);
       }
       else
       {
        state_error = "";
        $('#state_error').html('');
       }

       if(!pincode)
       {
        pincode_error= "Codigo pin requerido";
        $('#pincode_error').html('');
        $('#pincode_error').html(pincode_error);
       }
       else
       {
        pincode_error = "";
        $('#pincode_error').html('');
       }

       if(fname_error != '' || lname_error !='' || email_error !='' || phone_error !='' || address_error !='' || city_error != '' || state_error !='' || pincode_error !=''  )
       {
            return falseñ
       }
       else{


            var data ={
                'firstname':firstname,
                'lastname' :lastname ,
                'email'  : email ,
                'phone'  :phone ,
                'address'  :address ,
                'city' :city,
                'state'  :state ,
                'pincode' :pincode,
            };

            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function(response){
                    //alert(response.total_price)
                    var options = {
                        "key": "rzp_test_oRfSzsSGPgUAwU", // Enter the Key ID generated from the Dashboard
                        "amount":1*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": response.firstname+' '+response.lastname,
                        "description": "gracias por preferirnos",
                        "image": "https://example.com/your_logo",
                        "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (response){
                            alert(response.razorpay_payment_id);
                            
                        },
                        "prefill": {
                            "name": response.firstname+' '+response.lastname,
                            "email": response.email,
                            "contact": response.phone
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                        rzp1.open();
                    
                }
            });

       }
    });
});