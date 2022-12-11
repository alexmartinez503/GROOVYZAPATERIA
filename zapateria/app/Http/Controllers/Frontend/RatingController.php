<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Calificar;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
         $stars_rated = $request->input('product_rating');
         $product_id = $request->input('product_id');

         $product_check = Product::where('id', $product_id)->where('status','0')->first();
        if($product_check)
        {

            $verified_purchase = Order::where('orders.user_id', Auth::id())
                                ->join('order_items','orders.id','order_items.order_id')
                                ->where('order_items.prod_id', $product_id)->get();

            if($verified_purchase)  
            {
                $existing_rating = Calificar::where('user_id', Auth::id())-> where('prod_id', $product_id)->first();

                if($existing_rating)
                {
                    $existing_rating->stars_rated = $stars_rated;
                    $existing_rating->update();
                }
                else
                {

                    Calificar::created([
                        'user_id' => Auth::id(),
                        'prod_id' =>$product_id,
                        'stars_rated' => $stars_rated
                    ]);

                }
                return redirect()->back()->with('status', "Gracias por calificar este producto");
            }
            else
            {
                return redirect()->back()->with('status', "no se puede calificar un producto sin comprar");
            }

        }else{
            return redirect()->back()->with('status', "El enlace que usastes no funciona");
         }
    }
}
