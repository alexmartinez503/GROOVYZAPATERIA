<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists= Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlists'));
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish-> prod_id = $prod_id;
                $wish-> user_id = Auth::id();
                $wish->save();
                return response()->json(['status'=> "Producto agregado a la lista de deseos"]);
            }
            else
            {
                return response()->json(['status'=> "El producto no existe"]);
            }
        }
        else
        {
            return response()->json(['status'=> "inicia secion para continuar"]);
        }
    }

    public function deleteitem(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request-> input('prod_id');

            if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){

                $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish -> delete();

                return response()->json(['status'=> "producto eliminado de la lista de deseos"]);
            }

        }else
        {
            return response()->json(['status'=> "inicia secion para continuar"]);
        }

    }
    public function wishlistcount()
    {
        $wishcount= Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$wishcount]);
    }
}
