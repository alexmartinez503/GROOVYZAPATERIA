<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class checkoutController extends Controller
{
    public function index()
    {

        $old_cartitems = Cart::where('user_id', Auth::id())->get();

        /*foreach($old_cartitems as $item){
            if(!Product::where('id', $item->prod_id)->where('qty','>=',$item->prod_qty)->exists()){
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }*/
        $cartitems = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('cartitems')); 
    }


    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order ->fname = $request->input('fname');
        $order ->lname = $request->input('lname');
        $order ->email = $request->input('email');
        $order ->phone = $request->input('phone');
        $order ->address = $request->input('address');
        $order ->city = $request->input('city');
        $order ->state= $request->input('state');
        $order ->pincode = $request->input('pincode');
        $order -> tracking_no = 'Usuario'.rand(1111,9999);
        $order->save();


        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id'=> $item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=> $item->products->selling_price
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user ->name = $request->input('fname');
            $user ->lname = $request->input('lname');   
            $user ->phone = $request->input('phone');
            $user ->address = $request->input('address');
            $user ->city = $request->input('city');
            $user ->state= $request->input('state');
            $user ->pincode = $request->input('pincode');
            $user->update();
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);
        
        if($request->input('payment_mode')== "Paid by Paypal")
        {
            return response()->json(['status'=>"Orden realizada con exito"]);
        }
        return redirect('/')->with('status', "orden realizada con exito");
    }

    public function razorpaycheck(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitems as $item)
        {
            $total_price+= $item->products->selling_price * $item->prod_qty;
        }

            $firstname= $request->input('firstname');
            $lastname = $request->input('lastname');
            $email= $request->input('email') ;
            $phone = $request->input('phone');
            $address = $request->input('address');
            $city= $request->input('city');
            $state = $request->input('state');
            $pincode= $request->input('pincode');

            return response()->json([
                'firstname'=> $firstname,
                'lastname' => $lastname,
                'email'  => $email,
                'phone'  => $phone,
                'address'  => $address,
                'city' => $city,
                'state'  => $state,
                'pincode' => $pincode,
                'total_price' => $total_price,
            ]);

    }
}
